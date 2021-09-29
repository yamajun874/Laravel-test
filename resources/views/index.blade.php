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
      <form action="/todo/create" method="POST" class="create-form">
        @csrf
        <input type="text" name="content" class="create-content">
        <input type="submit" value="追加" class="create-btn">
      </form>
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @isset($items)
        @foreach($items as $item)
        <tr>
          <td></td>
          <td>
            <form action="/todo/update" method="POST" class="update-form">
              @csrf
              <input type="text" name="content" class="update-content">{{$item->content}}
              <input type="submit" value="更新" class="update-btn">
              <!-- <a href="/todo/update" class="update-btn"><input type="submit" value="更新"></a>
              <a href="/todo/delete" class="delete-btn"><input type="submit" value="削除"></a> -->
            </form>
          </td>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>