<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/styles.reset.css">
</head>
<body>
  <div class="content">
    <div class="list__wrapper">
      <h1 class="list-ttl">Todo List</h1>
      @if(count($errors) > 0)
      <ul class = "error-list">
        @foreach($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
      @endif
      <form action="/todo/create" method="POST" class="create-form">
        @csrf
        <input type="text" name="content" class="create-content">
        <input type="submit" value="追加" class="create-btn">
      </form>
      <table>
        <tr class="ttl-list">
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @isset($items)
        @foreach($items as $item)
        <tr class="items-list">
          <td>
            @if($item->created_at != $item->updated_at )
            {{$item->updated_at}}
            @else
            {{$item->created_at}}
            @endif
          </td>
          <form action="/todo/update" method="POST" class="update-form">
            @csrf
            <td>
              <input type="hidden" name="id" value="{{$item->id}}">
              <input type="text" name="content" class="update-content" value="{{$item->content}}">
            </td>
            <td>
              <input type="submit" value="更新" class="update-btn">
            </td>
            <td>
              <input type="submit" formaction="/todo/delete" value="削除" class="delete-btn">
            </td>
          </form>
        </tr>
        @endforeach
        @endisset
      </table>
    </div>
  </div>
</body>
</html>