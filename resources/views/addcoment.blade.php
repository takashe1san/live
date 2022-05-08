<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('insertCom')}}" method="post">
        @csrf
        <div class="post-editor">
            {{-- <select name="section" id="section">
                <option value="general">General</option>
            </select> --}}
            <input type="hidden" name="con_id" value="34">
            <textarea name="content" id="post-field" class="post-field" placeholder="Write new answer!"></textarea>
            <div class="d-flex">
                <input type="submit" class="btn btn-success px-4 py-1" value="add">
            </div>
        </div>
    </form>
</body>
</html>