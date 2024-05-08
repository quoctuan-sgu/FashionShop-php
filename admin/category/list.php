<?php 
    $categories=getAllCategory();
    if(isset($_POST['search'])){
        $search=$_POST['search'];
        $categories=searchCategoryByName($search);
    }
?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Category Management</h2>
        <a href="index.php?ac=category&act=add"> <i class="fa fa-plus mr-1"></i>Add new category</a>
        <div class="form-group mt-2 ml-3">
            
            <form method="POST" class="row m-l-5 pl-0 pt-0 pb-0 pr-0">
                <input type="text" class="form-control col-2 mr-2" name="search" placeholder="Search">
                <button type="submit" class="btn btn-primary col-2 mt-0">Search </button>
            </form>
        </div>
        <table class="table table-hover">
            <tr class="table-header">
                <th>Category ID</th>
                <th>Category Name</th>
                
                <th>Category Action</th>
            </tr>
            <?php foreach($categories as $category) { ?>
                <tr>
                    <td><?php echo $category['category_id']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td>
                        <a href="index.php?ac=category&act=edit&id=<?php echo $category['category_id']; ?>"><i class="fa fa-pen mr-2"></i></a>
                        <a href="index.php?ac=category&act=delete&id=<?php echo $category['category_id']; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>
</main>