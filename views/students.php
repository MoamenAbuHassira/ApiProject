<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id']; ?></td>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['age']; ?></td>
                    <td><?= $student['grade']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
