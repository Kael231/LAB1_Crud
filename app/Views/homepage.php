<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrudLab_1</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #e2d0bc;">
<div class="container mt-5" >
	 <div class="card p-4" style="background-color: #71b084;">

	<h3>Crud</h3>
	<br>
    <form action="/insert" method="post" style="background-color: #71b084;">
        <input type="hidden" name="ID" value="<?= isset($user['ID']) ? $user['ID'] : '' ?>">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ProdName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="ProdName" id="ProdName" placeholder="Enter Name" value="<?= isset($user['ProductName']) ? $user['ProductName'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="ProdDesc" class="form-label">Product Description</label>
                    <!-- Increase the height of the input box here -->
                    <input type="text" class="form-control" name="ProdDesc" id="ProdDesc" placeholder="Enter Description" style="height: 100px;" value="<?= isset($user['ProductDescription']) ? $user['ProductDescription'] : '' ?>">
                </div>
            </div>


            <!-- Right Column -->
          <div class="col-md-6">
		    <div class="row">
		        <div class="col-md-6 mb-3">
		            <label for="ProdCat" class="form-label">Product Category</label>
		            <input type="text" class="form-control" name="ProdCat" id="ProdCat" placeholder="Enter New Category" value="<?= isset($user['ProductCategory']) ? $user['ProductCategory'] : '' ?>">
		        </div>
		        <div class="col-md-6 mb-3">
		            <label for="SelectProdCat" class="form-label">Select Category</label>

		            <select class="form-select d-inline-block ml-2" name="SelectProdCat" id="SelectProdCat">
		                <?php
		                foreach ($crud as $us) {
		                    echo "<option>{$us['ProductCategory']}</option>";
		                }
		                ?>
		            </select>

		        </div>
		    </div>

		<script>
		    document.getElementById('SelectProdCat').addEventListener('change', function() {
		        var selectedValue = this.value;
		        document.getElementById('ProdCat').value = selectedValue;
		    });
		</script>




                <div class="mb-3">
                    <label for="ProdQuan" class="form-label">Product Quantity</label>
                    <input type="text" class="form-control" name="ProdQuan" id="ProdQuan" placeholder="Enter Quantity" value="<?= isset($user['ProductQuantity']) ? $user['ProductQuantity'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="ProdPr" class="form-label">Product Price</label>
                    <input type="text" class="form-control" name="ProdPr" id="ProdPr" placeholder="Enter Price" value="<?= isset($user['ProductPrice']) ? $user['ProductPrice'] : '' ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #344d56;">Save</button>
        <a href="/crud" class="btn btn-primary" style="background-color: #344d56;">New</a>
    </form>






	<div class="mt-5">
    <br>
    <br>
    <select class="form-select d-inline-block ml-2" id="categoryFilter">
	    <option value="All">All</option> <!-- Add an "All" option -->
		    <?php
		    foreach ($crud as $us) {
		        echo "<option>{$us['ProductCategory']}</option>";
		    }
		    ?>
	</select>

</div>

		<table class="table table-striped mt-3">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Description</th>
		            <th>Category</th>
		            <th>Quantity</th>
		            <th>Price</th>
		            <th></th>
		        </tr>
		    </thead>

		    <tbody>
		        <?php foreach ($crud as $us): ?>
		            <tr data-category="<?= $us['ProductCategory'] ?>">
		                <td><?= $us['ID'] ?></td>
		                <td><?= $us['ProductName'] ?></td>
		                <td><?= $us['ProductDescription'] ?></td>
		                <td><?= $us['ProductCategory'] ?></td>
		                <td><?= $us['ProductQuantity'] ?></td>
		                <td><?= $us['ProductPrice'] ?></td>
		                <td>
		                    <a href="/edit/<?= $us['ID']?>" class="btn btn-primary" style="background-color: #344d56;">Edit</a>
		                    <a href="/delete/<?= $us['ID']?>" class="btn btn-danger" style="background-color: #f2003c;">Delete</a>
		                </td>
		            </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>

		<script>
		    document.getElementById('categoryFilter').addEventListener('change', function() {
		        var selectedCategory = this.value;
		        var rows = document.querySelectorAll('tbody tr');
		        rows.forEach(function(row) {
		            var rowCategory = row.getAttribute('data-category');
		            if (selectedCategory === 'All' || selectedCategory === rowCategory) {
		                row.style.display = 'table-row';
		            } else {
		                row.style.display = 'none';
		            }
		        });
		    });
		</script>


<div class="mt-5">
  <br>
   <br>
<ul style="list-style-type:circle">

	<?php foreach ($crud as $us): ?>
		                <li><b>ID: </b><?= $us['ID'] ?></li>
		                <li><b>Name: 	</b><?= $us['ProductName'] ?></li>
		                <li><b>Description: 	</b><?= $us['ProductDescription'] ?></li>
		                <li><b>Category: 	</b><?= $us['ProductCategory'] ?></li>
		                <li><b>Quantity:	</b><?= $us['ProductQuantity'] ?></li>
		                <li><b>Price: 	</b><?= $us['ProductPrice'] ?></li>
		                <li>
		                    <a href="/edit/<?= $us['ID']?>" class="btn btn-primary" style="background-color: #344d56;">Edit</a>
		                    <a href="/delete/<?= $us['ID']?>" class="btn btn-danger" style="background-color: #f2003c;">Delete</a>
		                </li>
		               <br>
		        <?php endforeach; ?>
</ul>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>
</body>
</html>
