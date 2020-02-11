<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>CKFinder 3</title>
     <script src="js/ckfinder/ckfinder.js"></script>
 </head>
 <body>
    <div id="ckfinder1"></div>
    @routes
     <script>
         CKFinder.widget( 'ckfinder1', {
            width: '100%',
            height: 800,
            connectorPath: route('ckfinder_connector').template
         } );
     </script>
 </body>
 </html>