<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Commande</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <?php include('action.php'); ?>
    <div class="table" id="app">
        <table>
            <thead>
            <tr>
                <th>Qté</th>
                <th>Désignation</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1.00</td>
                <td>Forfait 3 lignes de base</td>
                <td>6.00€</td>
                <td>6.00</td>
            </tr>
            <tr>
                <td><?php echo $qte ?></td>
                <td>Forfait par ligne supplémentaire</td>
                <td>1.50€</td>
                <td><?php echo $priceLines ?></td>
            </tr>
            <tr>
                <td>1.00</td>
                <td>Forfait de facturation</td>
                <td>2.50€</td>
                <td><?php echo $bill ?></td>
            </tr>
            <tr>
                <td style="border: none"></td>
                <td style="border: none"></td>
                <td>Total pour 1 parution</td>
                <td><span>€</span><?php echo $subTotal ?></td>
            </tr>
            <tr>
                <td style="border: none"></td>
                <td style="border: none"></td>
                <td>Nbre de parution</td>
                <td><?php echo $nbrParution ?></td>
            </tr>
            <tr>
                <td style="border: none"></td>
                <td style="border: none"></td>
                <td>Total à payer</td>
                <td><span>€</span><?php echo $total ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
<script src="https://unpkg.com/vue@3"></script>
<script src="js/script.js"></script>
</body>
</html>
