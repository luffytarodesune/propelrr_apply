<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <form id="profile">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" pattern="^[A-Za-z,. ]+$" required>
                <span class="validation-error">Only letters, comma, and period are allowed.</span>
            </div>

            <div class="form-group">
                <label for="mobileNumber">Contact Number:</label>
                <input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{11}" maxlength="11" required>
            </div>

            <div class="form-group">
                <label for="dateOfBirth">Date of Birth:</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" readonly>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                    <option value="2">Prefer not to say</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="civilStatus">Civil Status:</label>
                <select id="civilStatus" name="civilStatus" required>
                    <option value="0">Single</option>
                    <option value="1">Married</option>
                    <option value="2">Separated/Divorced</option>
                    <option value="3">Widowed</option>
                    <option value="4">Live-in</option>
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>

        <div id="message"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
