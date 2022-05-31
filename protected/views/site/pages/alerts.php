<script type="text/javascript">
  $( document ).ready(function() {

  <?php
  
  echo(CHtml::ajax(array
                        (
                                'url'=>array('site/SendData'),
                               
                        )));
      
 

?>
});
</script>