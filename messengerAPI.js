const lib = require('lib');
const sms = lib.utils.sms['@1.0.9'];


module.exports = async (tel = '1111111111', name = 'world', message = '') => {


let result = await sms({
   to: tel,// (required)
  body: "Message: "+message +" From: "+name // (required)

});

};
