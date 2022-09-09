<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <div id="app">
        <form action="commande.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="rubrique">Rubrique: </label>
                <select name="rubrique" id="rubrique">
                    <option value="">Selectionner une rubrique</option>
                </select>
            </div>
            <br>
            <div class="announce">
                <div class="details">
                    <textarea style="border" name="priceLine" id="priceLine" cols="33" rows="3"
                              maxlength="105"></textarea><br>
                    <input type="text" name="priceLine1" id="priceLine1" maxlength="35"><br>
                    <input type="text" name="priceLine2" id="priceLine2" maxlength="35"><br>
                    <input type="text" name="priceLine3" id="priceLine3" maxlength="35"><br>
                    <input type="text" name="priceLine4" id="priceLine4" maxlength="35">
                </div>
                <div class="announcePrice">
                    <span>
                        Forfait <br>
                    3 lignes <br>
                    6.00€ <br>
                    7.50€ <br>
                    9.00€ <br>
                    10.50€ <br>
                    12.00€</span>
                </div>
            </div>
            <br>
            <div class="parution">
                <label for="parution">Nombre de parutions : </label>
                <input type="number" name="parution" id="parution" value="1">
            </div>
            <br>
            <div>
                <label for="facture">A FACTURER </label>
                <input type="checkbox" name="facture" id="facture" v-model="checked">
            </div>
            <br>

            <div class="contact">
                <div>
                    <label for="contact">Contact : </label>
                </div>
            </div>
            <br>
            <div>
                <div class="societe">
                    <div>
                        <label for="société">Société : </label>
                    </div>
                    <div>
                        <input type="text" name="société" id="société">
                    </div>
                </div>
                <br>
                <div class="tva">
                    <div>
                        <label for="tva">N° de TVA : </label>
                    </div>
                    <div>
                        <input type="text" name="tva" id="tva">
                    </div>
                </div>
            </div>
            <br>
            <div class="nom">
                <div>
                    <label for="nom">Nom* : </label>
                </div>
                <div>
                    <input type="text" name="nom" id="nom" required>
                </div>
            </div>
            <br>
            <div class="prenom">
                <div>
                    <label for="prénom">Prénom* : </label>
                </div>
                <div>
                    <input type="text" name="prénom" id="prénom" required>
                </div>
            </div>
            <br>
            <div class="rue">
                <div>
                    <label for="rue">Rue* : </label>
                </div>
                <div>
                    <input type="text" name="rue" id="rue" required>
                </div>
            </div>
            <br>
            <div class="numero">
                <div>
                    <label for="numéro">Numéro* : </label>
                </div>
                <div>
                    <input type="text" name="numéro" id="numéro" required>
                </div>
            </div>
            <br>
            <div class="postalCode">
                <div class="CP">
                    <div>
                        <label for="CP">C.P.*:</label>
                    </div>
                    <div>
                        <input type="text" name="CP" id="CP" required>
                    </div>
                </div>
                <div class="localite">
                    <div>
                        <label for="localité">Localité*:</label>
                    </div>
                    <div>
                        <input type="text" name="localité" id="localité" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="tel">
                <div>
                    <label for="tel">Tél.* :</label>
                </div>
                <div>
                    <input type="text" name="tel" id="tel" required>
                </div>
            </div>
            <br>
            <div class="mail">
                <div>
                    <label for="mail">Email* :</label>
                </div>
                <div>
                    <input type="email" name="mail" id="mail" required>
                </div>
            </div>
            <br>
            <div class="file">
                <div>
                    <label for="file">Justificatif de paiement:</label>
                </div>
                <div>
                    <input type="file" id="file" name="file">
                </div>
            </div>
            <br>
            <div class="submit">
                <input type="submit" id="submit" name="submit">
            </div>
        </form>
    </div>
</main>
<script src="https://unpkg.com/vue@3"></script>
<script src="js/script.js"></script>
</body>
</html>
