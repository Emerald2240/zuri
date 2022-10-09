<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3 Entered</title>
</head>
<style>
    input {
        display: block;
        width: 100%;
        height: 2rem;
    }

    .formgroup {
        padding: 2rem;
        border: black 20px solid;
    }

    h1 {
        text-transform: uppercase;
        text-align: center;
    }
</style>

<body>
    <h1>Zuri Week 3 Assignment</h1>
    <form action="user_data.php" method="post">
        <div class="formgroup">
            <label for="name">Name</label>
            <input required type="text" name="name">
        </div>

        <div class="formgroup">
            <label for="email">Email</label>
            <input required type="email" id="" name="email">
        </div>

        <div class="formgroup">
            <label for="dateOfBirth">Date Of Birth</label>
            <input required type="date" id="" name="dateOfBirth">
        </div>

        <div class="formgroup">
            <!-- <label for="mgender">
                Gender
            </label> -->
            Male:<input type="checkbox" name="mgender" value="Male">
            Female:<input type="checkbox" name="fgender" value="Female">

        </div>

        <div class="formgroup">
            <label for="country">Country</label>
            <input required type="text" name="country">
        </div>
        <input type="submit" value="SUBMIT">
    </form>
</body>

</html>