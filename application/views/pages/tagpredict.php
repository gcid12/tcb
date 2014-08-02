

    <style type="text/css" media="screen">
    <!--
      BODY { margin: 10px; padding: 0; font: 1em "Trebuchet MS", verdana, arial, sans-serif; font-size: 100%; }
      TEXTAREA { width: 80%;}
      FIELDSET { border: 1px solid #ccc; padding: 1em; margin: 0; }
      LEGEND { color: #ccc; font-size: 120%; }
      INPUT, TEXTAREA { font-family: Arial, verdana; font-size: 125%; padding: 7px; border: 1px solid #999; }
      LABEL { display: block; margin-top: 10px; } 
      IMG { margin: 5px; }
      INPUT.wide { width: 300px; }
      
      SPAN.tagMatches {
          margin-left: 10px;
      }
      
      SPAN.tagMatches SPAN {
          padding: 2px;
          margin-right: 4px;
          background-color: #0000AB;
          color: #fff;
          cursor: pointer;
      }
      
      PRE {
          background: #ddd;
          font-family: Courier;
          padding: 5px;
          overflow: auto;
      }
    -->
    </style>

    <script src="<?php echo base_url('assets/js/tag.js') ?>"></script>

    <script type="text/javascript">
    <!--
    $(function () {
        $('#tags').tagSuggest({
            tags: <?=json_encode($tags)?>
        });
        $('#tags-ajax').tagSuggest({
            url: 'tagging.php',
            delay: 250
        });
    });
    //-->
    </script>
 




