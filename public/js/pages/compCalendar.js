/*
 *  Document   : compCalendar.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Calendar page
 */

var CompCalendar = function() {
    var calendarEvents  = $('.calendar-events');

    /* Function for initializing drag and drop event functionality */
    var initEvents = function() {
        calendarEvents.find('li').each(function() {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            var eventObject = { title: $.trim($(this).text()), color: $(this).css('background-color') };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({ zIndex: 999, revert: true, revertDuration: 0 });
        });
    };

    return {
        init: function() {
            /* Initialize drag and drop event functionality */
            initEvents();

            /* Add new event in the events list */
            var eventInput      = $('#add-event');
            var eventInputVal   = '';

            // When the add button is clicked
            $('#add-event-btn').on('click', function(){
                // Get input value
                eventInputVal = eventInput.prop('value');

                // Check if the user entered something
                if ( eventInputVal ) {
                    // Add it to the events list
                    calendarEvents.append('<li class="animation-slideDown">' + $('<div />').text(eventInputVal).html() + '</li>');

                    // Clear input field
                    eventInput.prop('value', '');

                    // Init Events
                    initEvents();
                }

                // Don't let the form submit
                return false;
            });
        }
    };
}();