<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    report page
    <form action="insertrep" method="post">    
        @csrf
        <select name="type" id="type">
            <option value="con">consultation</option>
            <option value="com">comment</option>
            <option value="ans">answer</option>
        </select>
        <select name="id" id="id">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <select name="raison" id="raison">
            <option value="r1">wrong Information</option>
        </select>
        <textarea name="detail" id="d" cols="30" rows="10"></textarea>
        <button type="submit">report</button>
    </form>
</body>
</html>