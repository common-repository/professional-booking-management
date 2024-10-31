(function() {
    tinymce.create('tinymce.plugins.mpbmbtn', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
		    ed.addCommand('mpbbookingschedulecmd', function() {
				var shortcode = "[myprobooking-code control='schedule'/]";
				ed.execCommand('mceInsertContent', 0, shortcode);
            });
			
			ed.addCommand('mpbsignupcmd', function() {
				var shortcode = "[myprobooking-code control='signup'/]";
				ed.execCommand('mceInsertContent', 0, shortcode);
            });
			
			ed.addCommand('mpbcalendarcmd', function() {
				var shortcode = "[myprobooking-code control='calendar'/]";
				ed.execCommand('mceInsertContent', 0, shortcode);
            });
			
			ed.addCommand('mpbmemberlogincmd', function() {
				var shortcode = "[myprobooking-code control='login'/]";
				ed.execCommand('mceInsertContent', 0, shortcode);
            });

			
			ed.addButton('mpbbookingschedulecmd', {
                title : 'Add Service Schedule',
                cmd : 'mpbbookingschedulecmd',
                image : url + '/editorbtn/mpbbookingschedulecmd.png'
            });
			
			ed.addButton('mpbsignup', {
                title : 'Add New Customer Signup Form',
                cmd : 'mpbsignupcmd',
                image : url + '/editorbtn/mpbsignup.png'
            });
            
            ed.addButton('mpbcalendar', {
                title : 'Add Monthly Service Calendar',
                cmd : 'mpbcalendarcmd',
                image : url + '/editorbtn/mpbcalendar.png'
            });

            ed.addButton('mpbmemberlogin', {
                title : 'Add Customer\'s Login',
                cmd : 'mpbmemberlogincmd',
                image : url + '/editorbtn/mpbmemberlogin.png'
            });
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                    longname : 'MyProBooking Booking Management Buttons',
                    author : 'Ty.Nguyen',
                    authorurl : 'https://www.myprobooking.com',
                    infourl : 'http://news.myprobooking.com/more-on-wordpress',
                    version : "1.0.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('mpbmbtn', tinymce.plugins.mpbmbtn);
	
})();