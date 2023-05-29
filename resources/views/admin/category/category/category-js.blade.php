
<script type="text/javascript">
    $('body').on('click','.edit',function(){
     let cat_id=$(this).data('id');
     $.get("category/edit/"+cat_id,function(data){
             $('#edit_category_name').val(data.category_name);
             $('#old_icon').val(data.icon);
             $('#home_page').val(data.home_page);
             $('#category_id').val(data.id);
     });
    });
    </script>