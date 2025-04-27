<?php 

$pdo = new PDO(
    "mysql: host=localhost;dbname=enset-2025",
    "root",
    ""
);



$editMode = isset($_GET['edit']);
$editId = $editMode ? $_GET['edit'] : null;
$editEmail = '';
$editPass = '';
$editRole = '';

// les variables de l'utilisateur a editer
if ($editMode) {
    $stmt = $pdo->query("SELECT * FROM users WHERE id = $editId");
    $editUser = $stmt->fetch(PDO::FETCH_ASSOC);

    $editEmail = $editUser['email'];
    $editPass = $editUser['password'];
    $editRole = $editUser['role'];
}
// récuperer tous les utilisateurs
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];

        $sql = "UPDATE  users SET email='$email', password='$pass', role='$role' WHERE id=$id";
        $stmt = $pdo->query($sql);     
    }
    else {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];


    $sql = "INSERT INTO users VALUES(NULL, '$email', '$pass', '$role')";
 $stmt = $pdo->query($sql);
}
    header('Location: index1.php');
    exit();
}
// supprimer un utilisateur
if (isset($_GET['idd'])) {
    $idd = $_GET['idd'];
    $sql = "DELETE FROM users WHERE id=$idd";
    $stmt = $pdo->exec($sql);
    header("location: index1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users list</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1><?=  $editMode ? 'Edit user' : 'Users List' ?></h1>
        <form action="index1.php" method="post">
        <?php if ($editMode): ?>
            <input type="hidden" name="update" value="1">
            <input type="hidden" name="id" value="<?= $editId ?>">
            <?php endif; ?>
            <input type="text" name="email" placeholder="Email" class="form-control mb-3" value="<?= $editMode ? $editEmail : '' ?>">
            <input type="password" placeholder="Password" name="pass" class="form-control mb-3" value="<?= $editMode ? $editPass : '' ?>">
            <select name="role" id="" class="form-select mb-3">
                <option value="guest" <?= ($editMode && $editRole === 'guest') ? 'selected' : '' ?>>
                Guest</option>
                <option value="author" <?= ($editMode && $editRole === 'author') ? 'selected' : '' ?> 
                >Author</option>
                <option value="admin" <?= ($editMode && $editRole === 'admin') ? 'selected' : '' ?>
                >Admin</option>
            </select>
            <button class="btn btn-success" ><?= $editMode ? 'Enregistrer' : 'Ajouter' ?></button>
        </form>
        <hr>

        <?php if (!$editMode) : ?>
        <table class="table table-dark"  >
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>ROLE</th>
                <th colspan="2" class="text-center">Actions</th>
                
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td  class="text-center">
                        <a onclick="f(event)" href="index1.php?idd=<?=  $user['id'] ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                    <td  class="text-center"> <a href="index1.php?edit=<?= $user['id'] ?>" class="btn btn-primary" onclick=<?php $editMode = 1;?>><i class="bi bi-pencil-square"></i></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <hr>
        <?php endif; ?>
    </div>

    <script>
        function f(e) {
            e.preventDefault()
            if(confirm('Etes-cous sur de vouloir supprimer')) {
                location.href = e.target.href
            }
        }
    </script>
</body>

</html>