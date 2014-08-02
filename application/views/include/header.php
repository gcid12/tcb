<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Taking Care of Business">
   <meta name="keywords" content="TCB">
   <meta name="author" content="TCB">

   <title>&#84;&#67;&#66; !!!123</title>
   
   <link href='http://fonts.googleapis.com/css?family=Raleway:100,400' rel='stylesheet' type='text/css'>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/tcb_green.css') ?>" rel="stylesheet">
   <!-- <link href="<?php //echo base_url('assets/css/custom.css') ?>" rel="stylesheet"> -->
   <link href="<?php echo base_url('assets/css/jquery.tagit.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/tagit.ui-zendesk.css') ?>" rel="stylesheet">
  
<!--    
   <script src="<?php //echo base_url('assets/js/bootstrap.js') ?>"></script>
   <script src="<?php //echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
   <script src="<?php //echo base_url('assets/js/jquery-ui-1.10.4.custom.min.js') ?>"></script>
   <script src="<?php //echo base_url('assets/js/custom.js') ?>"></script>

   <script src="<?php //echo base_url('assets/js/tag-it.js') ?>" charset="utf-8" type="text/javascript"></script>
 -->
   
   
  <!-- tooltips -->
   <script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip({
    placement: 'bottom'
});
    });
</script>

<script>  //TAGS SCRIPT
        $(function(){
            var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];

            //-------------------------------
            // Minimal
            //-------------------------------
            $('#myTags').tagit();

            //-------------------------------
            // Single field
            //-------------------------------
            $('#singleFieldTags').tagit({
                availableTags: sampleTags,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });

            // singleFieldTags2 is an INPUT element, rather than a UL as in the other 
            // examples, so it automatically defaults to singleField.
            $('#singleFieldTags2').tagit({
                availableTags: sampleTags
            });

            //-------------------------------
            // Preloading data in markup
            //-------------------------------
            $('#myULTags').tagit({
                availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
                // configure the name of the input field (will be submitted with form), default: item[tags]
                itemName: 'item',
                fieldName: 'tags'
            });

            //-------------------------------
            // Tag events
            //-------------------------------
            var eventTags = $('#eventTags');

            var addEvent = function(text) {
                $('#events_container').append(text + '<br>');
            };

            eventTags.tagit({
                availableTags: sampleTags,
                beforeTagAdded: function(evt, ui) {
                    if (!ui.duringInitialization) {
                        addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
                    }
                },
                afterTagAdded: function(evt, ui) {
                    if (!ui.duringInitialization) {
                        addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
                    }
                },
                beforeTagRemoved: function(evt, ui) {
                    addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
                },
                afterTagRemoved: function(evt, ui) {
                    addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
                },
                onTagClicked: function(evt, ui) {
                    addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
                },
                onTagExists: function(evt, ui) {
                    addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
                }
            });

            //-------------------------------
            // Read-only
            //-------------------------------
            $('#readOnlyTags').tagit({
                readOnly: true
            });

            //-------------------------------
            // Tag-it methods
            //-------------------------------
            $('#methodTags').tagit({
                availableTags: sampleTags
            });

            //-------------------------------
            // Allow spaces without quotes.
            //-------------------------------
            $('#allowSpacesTags').tagit({
                availableTags: sampleTags,
                allowSpaces: true
            });

            //-------------------------------
            // Remove confirmation
            //-------------------------------
            $('#removeConfirmationTags').tagit({
                availableTags: sampleTags,
                removeConfirmation: true
            });
            
        });
    </script>



<meta name="google-site-verification" content="PU60gawe9qFnfY-YTlwsInho2ffDgGborY9ynSVBrlM" />

</head>
<body>
