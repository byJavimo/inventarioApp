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
    <h4 style="text-align:center;">Actualización Producto</h4>
    <form  class="default-form" action="Controllers/product_controller.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<? echo $product->refCode ?>">
        <label for="refCode"><b>Código de referencia </b></label><input type="text" name="refCode" value="<? echo $product->refCode ?>" required><br>
        <label for="name"><b>Nombre</b></label><input type="text" name="name" value="<? echo $product->name ?>" required><br>
        <label for="amount"><b>Cantidad</b></label><input type="text" value="<? echo $product->amount ?>" name="amount" required><br>
        <label for="price"><b>Precio</b></label><input type="text"  value="<? echo $product->price ?>" name="price" required><br>                
        <input type="submit" name="submit" value="Actualizar"/>
    </form>
</body>