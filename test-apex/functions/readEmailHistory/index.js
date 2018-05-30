
const	AWS = require('aws-sdk');
		AWS.config.region = 'eu-west-1';

const DDB = new AWS.DynamoDB.DocumentClient({region: 'ap-southeast-1'});

var shortid = require('shortid');

exports.handle = function(event, context, callback) {

	//read item from EmailHistory Document 
	let scanPromise = DDB.scan({
		"TableName": "EmailHistory",
		"Limit": 100
	}, function(err, rs){

		if(err) callback(error,null);
		else callback(null,rs);

	}).promise();

}
