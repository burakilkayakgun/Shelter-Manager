<html>
    <head>
        <title>Home Page</title>
        <style>
            div{
                padding-right: 30px;
                padding-bottom: 15px;
            }
        </style>
    </head>
    <body>
        <div class="btn-group">
            <button><form action="create_manager.php" method="POST"> 
                <p><input type="submit" value="Create a Manager"  /></p> </form></button>    
            <button><form action="list_managers.php" method="POST">
                <p><input type="submit" value="List all Managers" /></p> </form></button>     
        </div>

        <div class="btn-group">
            <button><form action="create_caretaker.php" method="POST"> 
                <p><input type="submit" value="Create a Caretaker" /></p> </form></button>    
            <button><form action="list_caretakers.php" method="POST">
                <p><input type="submit" value="List all Caretakers" /></p> </form></button>
        </div>

        <div class="btn-group">
            <button><form action="create_animal.php" method="POST"> 
                <p><input type="submit" value="Create an Animal" /></p> </form></button>    
            <button><form action="list_animals.php" method="POST">
                <p><input type="submit" value="List all Animals" /></p> </form></button>
        </div>

        <div class="btn-group">
            <button><form action="create_sponsor.php" method="POST"> 
                <p><input type="submit" value="Create a Sponsor" /></p> </form></button>    
            <button><form action="list_sponsor.php" method="POST">
                <p><input type="submit" value="List all Sponsors" /></p> </form></button>
        </div>
        <div class="btn-group">
            <button><form action="list_animals_sponsor.php" method="POST"> 
                <p><input type="submit" value="List the Animals of a Sponsor" /></p> </form></button>
        </div>
        <div class="btn-group">
            <button><form action="list_animals_caretaker.php" method="POST"> 
                <p><input type="submit" value="List the Animals of a Caretaker" /></p> </form></button>
        </div>
        <div class="btn-group">
            <button><form action="list_animals_species.php" method="POST"> 
                <p><input type="submit" value="List the Animals of a Species" /></p> </form></button>
        </div>
        <div class="btn-group">
            <button><form action="list_animals_without_sponsor.php" method="POST"> 
                <p><input type="submit" value="List the Animals who don't have Sponsor" /></p> </form></button>
        </div>
        <div class="btn-group">
            <button><form action="list_caretakers_animals_count.php" method="POST"> 
                <p><input type="submit" value="List Caretakers according Animals they have" /></p> </form></button>
        </div>

        <div class="btn-group">
            <button><form action="login.php" method="POST"> 
                <p><input type="submit" value="Log out" /></p> </form></button>
        </div>
    </body>
</html>