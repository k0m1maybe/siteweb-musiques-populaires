<div class="mainpart">
    <div class="uploadbox">
        <h1>Veuillez remplir les détails de l'album et poser votre chronique</h1>
        <form method="post" enctype="multipart/form-data" action="index.php?page=upload_info">
            <ul>
                <li><input class="ulb1" required type="text" name="album" placeholder="Nom de l'album" /></li>
                <li><input class="ulb1" required type="text" name="author" placeholder="Nom de l'auteur" /></li>
                <li>Sa date de sortie: <input class="ulb2" required type="date" name="rd" /></li>
                <li>La langue principale: <select name="lng">
                        <option value="French">français</option>
                        <option value="English">anglais</option>
                        <option value="Chinese">chinois</option>
                        <option value="German">allemand</option>
                        <option value="Japanese">japonais</option>
                        <option value="Korean">coréen</option>
                        <option value="Spanish">espangnol</option>
                        <option value="Others">Autres</option>
                    </select>
                </li>
                <li><input class="ulb3" required type="file" name="file"></li>
                <li></li>
                <li><input class="uploadbuttom" type="submit" value="Ajouter un chronique" name="upload"></li>
            </ul>
        </form>
    </div>
</div>