/**
 * 
 * @param {type} form
 * @param {type} data
 * @param {type} hasError
 * @returns {Boolean}
 */
function mySubmitFormFunction(form, data, hasError){    
    if (!hasError){
        // No errors! Do your post and stuff
        // FYI, this will NOT set $_POST['ajax']...         
        $.post(form.attr('action'), form.serialize(), function(res){
            // Do stuff with your response data!
            if (res.result)
                console.log(res.data);
        });
    }
    // Always return false so that Yii will never do a traditional form submit
    return false;
}