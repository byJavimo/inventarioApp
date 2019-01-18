<head>
        <style>
            .default-table {
                height: 50%;
                width: 50%;
                margin: 100px  auto;
                border-style: double;
                border-width: 5px;
            }

            .default-form {
                height: 50%;
                width: 50%;
                margin: 0  auto;
                border-width: 5px;
            }

            input {
                margin: 2%;
                padding: 2%;
                width: 70%;
            }

            td {
                text-align:center;
            }
        </style>
</head>
<body>
    <table class="default-table">
        <caption> <b>Tabla de inventario de productos</b></caption>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th colspan=2> Acciones </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($products as $product) {?> 
                    <tr>
                        <td> <?php echo $product->refCode; ?></td>
                        <td> <?php echo $product->name; ?></td>
                        <td> <?php echo $product->amount; ?></td>
                        <td> <?php echo $product->price; ?></td>
                        <td> <a href="Controllers/product_controller.php?action=update&id=<?php echo $product->id ?>">Actualizar</a></td>    
                        <td> <a href="Controllers/product_controller.php?action=delete&id=<?php echo $product->id ?>">Actualizar</a></td>                        
                    </tr>



                
            ?>
        </tbody>
    </table>
</body>