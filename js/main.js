/**
 *  File for global js uses
 *  The var lsl_data comes from php through wp_localize_script()
 */

/**
 * Toggle a class in the pop up element
 */
function popUpUtilities() {
    var popUp = document.getElementById("popUp");

    if(popUp === null){
        return;
    }

    popUp.classList.toggle("target");
}

/**
 * Toggle a class in the virtual tour pop-up element
 */
function virtualTourPopUpUtilities() {
    var virtualTourPopUp = document.getElementById("virtualTourPopUp");

    if(virtualTourPopUp === null){
        return;
    }

    virtualTourPopUp.classList.toggle("target");
}

/**
 * It submits the contact form to the server and process the response
 */
function popUpSubmitContact(){
    var submitContactBtn = document.querySelector('#popUp #submit');

    if(submitContactBtn === null){
        return;
    }

    submitContactBtn.addEventListener('click', function(event){
        event.preventDefault();

        function getInputValue(id){
            var element = document.getElementById(id);

            if(element === null){
                return '';
            }

            return element.value;
        }

        function getCheckboxValue(id){
            var checkbox = document.getElementById(id);

            if(checkbox === null){
                return false;
            }

            if(checkbox.checked){
                return checkbox.value;
            }

            return false;
        }

        var req = jQuery.ajax({
            'url': '/wp-admin/admin-ajax.php',
            'method': 'POST',
            'data': {
                'author': getInputValue('author'),
                'email': getInputValue('email'),
                'comment': getInputValue('comment'),
                'comment_post_ID': getInputValue('comment_post_ID'),
                'comment_parent': getInputValue('comment_parent'),
                'terms': getCheckboxValue('terms'),
                'action': 'lsl_submit_contact_form',
            }
        });

        req.done(function(res){
            var resultContainer = document.getElementById('contactResult');

            // Filter certain parts of the text
            res = res.replace('<p>', '<div class="contactRes">');
            res = res.replace('</p>', '</div class="contactRes">');
            res = res.replace('comentario', 'mensaje');
            res = res.replace(' (nombre, correo electrónico)', '');

            // Determine if the comment has been sent acording to the response markup
            var notSent = res.indexOf('commentNotSent') !== -1;
            var sent = res.indexOf('commentSent') !== -1;

            if(sent || notSent){
                // The message has been saved as a comment. Block the submit button. 
                submitContactBtn.setAttribute('disabled', 'disabled');
                submitContactBtn.classList.add('btnDisabled');
            }

            if(sent){
                // Send an event to Google Analytics
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'Contact form',
                    eventAction: 'sent',
                    eventLabel: location.pathname,
                });
            }

            if(resultContainer === null){
                return console.log(res);
            }

            resultContainer.innerHTML = res;
        });

        req.fail(function( jqXHR, textStatus ) {
            console.err( "Request failed: " + textStatus );
        });
    });
}

/**
 * Toggle a class in the pop up element for map
 */
function mapPopUpUtilities() {
    var mapPopUp = document.getElementById("map");

    if(mapPopUp === null){
        return;
    }

    mapPopUp.classList.toggle("toggleMap");
}

/**
 * Toggle a class in the map button
 */
function mapButtonUtilities() {
    var mapButtonActive = document.getElementById("mapButton");

    if(mapButtonActive === null){
        return;
    }

    mapButtonActive.classList.toggle("mapButtonActive");
}

/**
 * Toggle a class in the opening horary day element
 */

function dayButtonUtilities() {
    var dayButtons = document.getElementsByClassName("notActualDay");

    for(var dayButton of dayButtons){
        dayButton.classList.toggle("notActualDayHidden");
    }
}

/**
 * Find a string in the targetClasses string
 * @param    string    strToFilter
 * @return   boolean   Whether the strTofilter is found or not in targetClasses
 */
function hasClass(className, classToFind){
    var checks = [
        className.match(new RegExp('^' + classToFind + '$')) instanceof Array,
        className.match(new RegExp('^' + classToFind + '\\s')) instanceof Array,
        className.match(new RegExp('\\s' + classToFind + '$')) instanceof Array,
        className.match(new RegExp('\\s' + classToFind + '\\s')) instanceof Array,
    ]

    if(!checks[0] && !checks[1] && !checks[2] && !checks[3]){
        return false;
    }

    return true;
}


/*** SCRIPT ***/


// Entry point for centre's page
if(
    typeof lsl_data === 'object'
    && lsl_data.hasOwnProperty('is_centre')
    && lsl_data.is_centre === '1'
){
    window.addEventListener("DOMContentLoaded", function(){

        // Popup

        var buttonOpen = document.getElementById("contactButton");

        if(buttonOpen !== null){
            buttonOpen.addEventListener("click", function(){
                popUpUtilities();
                popUpSubmitContact();
            });
        }


        var buttonClose = document.getElementById("closePopUp");

        if(buttonClose !== null){
            buttonClose.addEventListener("click", function(){
                popUpUtilities();
            });
        }


        // Virtual tour Popup

        var virtualTourButtonOpen = document.getElementById("virtualTourButton");

        if(virtualTourButtonOpen !== null){
            virtualTourButtonOpen.addEventListener("click", function(){
                virtualTourPopUpUtilities();
            });
        }

        var virtualTourbuttonClose = document.getElementById("virtualTourClosePopUp");

        if(virtualTourbuttonClose !== null){
            virtualTourbuttonClose.addEventListener("click", function(){
                virtualTourPopUpUtilities();
            });
        }


        // Days schedules

        var activeButton = document.getElementById("showDaysButton");

        if(activeButton !== null){
            activeButton.addEventListener("click", function(){
                dayButtonUtilities();
                activeButton.classList.toggle("activeShowDays");
            });
        }
    });
}


// Entry point for Hub's page
if(
    typeof lsl_data === 'object'
    && lsl_data.hasOwnProperty('is_hub')
    && lsl_data.is_hub === '1'
){
    window.addEventListener("DOMContentLoaded", function(){

        var mapButton = document.getElementById("mapButton");
        var containers = document.getElementsByClassName("storesBox");

        // Popup map
        if(mapButton !== null){
            mapButton.addEventListener("click", function(){
                mapPopUpUtilities();
                mapButtonUtilities();
            });
        }

        if(containers.length > 0){
            var container = containers[0];
            container.addEventListener("click", function(event){
                var targetClassName = event.target.className;
                var correctTarget = false;

                correctTarget = hasClass(targetClassName, 'compomentItemSearch')
                || hasClass(targetClassName, 'compomentItemSearch-number')
                || hasClass(targetClassName, 'compomentItemSearch-unit')
                || hasClass(targetClassName, 'compomentItemSearch-show');

                if(!correctTarget){
                    return;
                }

                mapPopUpUtilities();
                mapButtonUtilities();
            })
        }
    });
}
