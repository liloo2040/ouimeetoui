<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        div.card {
            height: 150px;
            width: 90vw;
            padding: 20px;
            margin: 20px;
            margin-left: 5vw;
            border: 1px solid lightgray;
            box-shadow: 5px 5px 5px lightgray;
        }
    </style>
</head>
<body>
    <form action="index.php/?action=addEvent" method="post">
        <label for="nomEvent">Nom</label>
        <input type="text" name="nomEvent" id="nomEvent">

        <label for="dateDEvent">Date de début</label>
        <input type="date" name="dateDEvent" id="dateDEvent">

        <label for="dateFEvent">Date de fin</label>
        <input type="date" name="dateFEvent" id="dateFEvent">

        <label for="descriptionEvent">Description</label>
        <input type="text" name="descriptionEvent" id="descriptionEvent">

        <label for="lieuEvent">Lieu</label>
        <input type="text" name="lieuEvent" id="lieuEvent">

        <input type="submit" value="Créer">
    </form>

</body>
</html>