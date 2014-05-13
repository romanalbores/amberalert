/**
* VARIABLES
*/
var current_step = 0;
var next_step = 0;
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
        $.post(form.attr('action'), form.serialize() + "&next_step=" + next_step, function(res){
            // Do stuff with your response data!            
            //jQuery('#wizard-incidencias').bootstrapWizard('next'); 
            //$('#wizard-incidencias').bootstrapWizard('show', 1);            
            // $( "#wizard-incidencias li:eq(" + next_step + ") a" ).trigger("click");
            // $("html, body").animate({ scrollTop: 0 }, "slow");            
//            console.log(res);
            if (res.result){
                console.log(res.data);
                window.location = res.data;
            }
        },
        'json');
    }
    else{
         $("html, body").animate({ scrollTop: 0 }, "slow");
    }
    // Always return false so that Yii will never do a traditional form submit
    return false;
}


function validaPaso(tab, navigation, index, direction){
    current_step > index ? index + 1 : index - 1;    
    next_step = index;  
    current_tab = current_step + 1;
    console.log("CURRENT STEP: " + current_step + " CURRENT INDEX: " + index + " CURRENT TAB: " + current_tab);
    var form_to_validate = $('#wizard-incidencias_tab_' + current_tab + ' form.validarForm');
    
    
    form_to_validate.submit();
    return false;
}

function seleccionarPasoSiguiente(next_step_local){
    console.log("next_step_local " + next_step_local);
    $( "#wizard-incidencias li:eq(" + next_step_local + ") a" ).trigger("click");
}