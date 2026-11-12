<style>
    label {
        display: inline-block;
        width: 150px;
    }
</style>

<form action="" method="POST">

    <label for="">Student Name</label>
    <input type="text" name="student_name" value="<?php echo $student_name; ?>"> <br><br>

    <label for="">Matric Number</label>
    <input type="text" name="matric_number" value="<?php echo $matric_number; ?>"> <br><br>

    <label for="">Subject</label>
    <input type="text" name="subject" value="<?php echo $subject; ?>"> <br><br>

    <label for="">Test 1 (20%)</label>
    <input type="text" name="test_1" value="<?php echo $test_1; ?>"> <br><br>

    <label for="">Test 2 (30%)</label>
    <input type="text" name="test_2" value="<?php echo $test_2; ?>"> <br><br>

    <label for="">Final (50%)</label>
    <input type="text" name="final" value="<?php echo $final; ?>"> <br><br>

    <input type="submit" name="<?php echo $button_name; ?>" value="<?php echo $button_value; ?>">

</form>