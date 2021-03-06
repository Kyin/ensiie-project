
<div class="container-fluid">
    <h3> Créer une nouvelle table</h3>

    <form id="form_game" action="actions/create_game_action.php" name="form_game" method="post">
        <input type="hidden" name="creator" value="<?=$_SESSION['user']?> "/>

        <div class="form-group">
            <label for="gamename" class="font-weight-bold"> Nom: </label>
            <input type="text" id="gamename" name="gamename" onblur="check_title()" placeholder="Nom de la table" value=""/>
            <label class="ml-2 alert-danger" id="warning_gamename"></label>
        </div>

        <!-- GAME SYSTEM SELECTION -->
        <div class="form-group">
            <label for="gamesystem"class="font-weight-bold"> Système: </label>
            <select id="gamesystem" name="gamesystem" class="">
                <?php
                if(!$gamesystems) echo "<option value='0' disabled selected> No options found </option>";
                else {
                    foreach ($gamesystems as $gamesystem)
                    {
                        echo "<option value='".$gamesystem->getGamesystemid()."'> ".$gamesystem->getSystemname()." </option>";
                    }
                }
                ?>

                <!-- todo : add an add system option-->
            </select>
        </div>

        <!-- ESTIMATED DURAION-->
        <div class="form-group">
            <label for="duration" class="font-weight-bold"> Nombre de séances estimé : </label>
            <input type="number" id="duration" name="duration" onblur="check_duration()" />
            <label class="alert-danger" id="warning_duration"> </label>
        </div>


        <!--SCHEDULE SELECTION -->
        <label for="oneshot" class="font-weight-bold"> Ajouter un horaire: </label>
        <div class="form-group">
            <!-- ADD A SCHEDULE -->


            <!-- ADD A ONE-TIME SESSION -->

            <div id="oneshot">
                <label for="dateoneshot"> Date</label>
                <input id="dateoneshot" type="date" name="date"/>


                <label for="starttimeoneshor"> Début</label>
                <input type="time" name="starttimeoneshot" id="starttimeoneshot" value="20:00"/>


                <label for="endtimeoneshot"> Fin </label>
                <input type="time" name="endtime" id="endtimeoneshot" value="00:00"/>

                <button type="button" class="btn btn-primary btn-sm" onclick="add_one_shot();check_schedule();"> Ajouter une date</button>

            </div>
            <br>


            <!-- ADD RECCURENT SESSSIONS -->


            <!-- day of week -->
            <label for="dayofweek"> Jour</label>
            <select class="" id="dayofweek">
                <option value="1" selected> Lundi</option>
                <option value="2"> Mardi</option>
                <option value="3"> Mercredi</option>
                <option value="4"> Jeudi</option>
                <option value="5"> Vendredi</option>
                <option value="6"> Samedi</option>
                <option value="0"> Dimanche</option>
            </select>


            <!-- reccurence -->
            <label for="reccurence"> Réccurrence </label>
            <select id="reccurence">
                <?php
                if(!$reccurrences) echo "<option value='0' disabled selected> No options found </option>";
                else {
                    foreach ($reccurrences as $reccurrence)
                    {
                        echo "<option value='".$reccurrence->getReccurrenceid()."'> ".$reccurrence->getReccurrencename()." </option>";
                    }
                }
                ?>
            </select>

            <!-- starting hour todo: use timepicker library instead -->
            <label for="starttimereccurence"> Début </label>
            <input type="time" id="starttimereccurence" name="starttime" value="20:00"/>

            <!-- ending hour -->
            <label for="endtimereccurence"> Fin</label>
            <input type="time" id="endtimereccurence" name="endtime" value="00:00"/>

            <!-- submit -->
            <button type="button" class="btn btn-primary btn-sm" onclick="add_reccurent();check_schedule();"> Ajouter un horaire
                récurrent
            </button>


            <!-- list of schedules added so far -->
            <div class="form-group">
            <label for="schedule" class="font-weight-bold"> Horaires proposés : </label>
            <!-- todo : option pour supprimer les horaires errones -->
                <ul id="listSchedules">

                </ul>
            </div>

        </div>

        <!-- DESCRIPTION -->
        <div class="form-group">
            <label for="gamedesc" class="font-weight-bold"> Description: </label>
            <textarea form="form_game" class="form-control" rows="3" id="gamedesc" onblur="check_desc()" name="gamedesc" placeholder="Description de la table"></textarea>
            <label id="warning_gamedesc" class="alert-danger"> </label>
        </div>

        <!-- LIST OF FILES SO FAR -->
        <div class="form-group">
            <label for="listfiles" class="font-weight-bold"> Fichiers de la table : </label>
            <ul id="listfiles">
            </ul>
        </div>
        <!-- ADD FILE -->
        <div class="form-group">
            <label for="userfiles" class="font-weight-bold"> Sélectionner un fichier </label>
            <select id="userfiles" onchange="updateselect()">
                <?php
                if(empty($userfiles)) echo "<option disabled > Pas de fichiers </option>";
                foreach ($userfiles as $userfile) {
                        echo "<option value='$userfile->fileid'> $userfile->filename </option>  ";
                    }
                ?>
            </select>
            <input type="button" onclick="add_file()" class="btn btn-primary btn-sm" value="Ajouter">
        </div>


        <!-- SUBMIT -->
        <div class="form-group">
            <button type="submit" value="submit" id="submit" class="btn btn-primary" disabled> Créer la table </button>
        </div>
    </form>

    <script src="js/add_schedule_script.js"></script>
    <script src="js/add_file.js"></script>
    <script src="js/verify_create_game.js"></script>

</div>