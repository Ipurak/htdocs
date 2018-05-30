
const	AWS = require('aws-sdk');
		AWS.config.region = 'eu-west-1';

const SES = new AWS.SES();//load SES service to send email 
const DDB = new AWS.DynamoDB.DocumentClient({region: 'ap-southeast-1'});//call dynamoDB

var shortid = require('shortid');//generate uniq id

exports.handle = function(event, context, callback) {
	
	var paramsEmail = {
		Destination:{
			ToAddresses:[
				event.to//reciver
			]
		},
		Message:{
			Body:{
				Text:{
					Data:event.body,//email content
					Charset:'UTF-8'
				}
			},
			Subject:{
				Data:"Test AWS Lambda Function Send Email",//email subject
				Charset:'UTF-8'
			}
		},
		Source:event.from//sender
	};

	var sendPromise = SES.sendEmail(paramsEmail).promise();
		sendPromise.then(function(data) {

			//write item into EmailHistory Document
			let putPromise = DDB.put({
				"TableName": "EmailHistory",
				"Item":{
					"date" : Date.now().toString(),
					"from" : event.from,
					"to"   : event.to,
					"body" : event.body,
					"id" : shortid.generate()
				}
			}, function(err, rs){

				if(err) callback(err,null);
				else callback(null,rs);

			}).promise();

			putPromise.then(function(data){
				
				callback(null,{message:'success'})

			}).catch(function(err,rs){

				callback(err,null);

			});

		}).catch(function(err) {//send mail fail

		    callback(err,null);

		});

}
