<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />

<title>Add new game</title>

<div id="test"></div>
<?php include("view/menu-links.php"); ?>
<h1 class="center">Add new game</h1>

<form action="<?= BASE_URL . "bowl/add" ?>" method="post">
<table id="bowling-table">
<tbody>
    <tr>
            <p>
        <label>Date: <input type="date" name="game_date" value="<?= $bowl["game_date"] ?>" required />
        <span class="important"><?= $errors["game_date"] ?></span></label>
        <label>Public: <input type="checkbox" name="public_box"> </label>
        </p>
    </tr>

                <tr id="pointsField">
                <td class="first ">
                    <div>
                        <input type="text" name="field1-1" pattren="[0-9]xX//.{1,}" id="1-1"  value="0" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  name="field1-2" id="1-2" value="" size="1" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field2-1" id="2-1" value="0" pattren= ".{1,}" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"name="field2-2" id="2-2" value="" size="1" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  name="field3-1" id="3-1" value="0" pattren= ".{1,}" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text" name="field3-2" id="3-2" value="" size="1" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field4-1" id="4-1" value="0" pattren= ".{1,}" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"name="field4-2"  id="4-2" value="" size="1" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="5-1" name="field5-1"value="0" pattren= ".{1,}" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text" id="5-2" value="" name="field5-2" size="1" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field6-1" id="6-1" value="0" pattren= ".{1,}" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="6-2"name="field6-2"  value="" size="1" maxlength="1">
                    </div>
                </td>
                
                    
              
                <td class="first">
                    <div>
                        <input type="text"  id="7-1" value="0" pattren= ".{1,}" name="field7-1" size="1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="7-2" value="" size="1"name="field7-2" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="8-1" value="0" pattren= ".{1,}" size="1"name="field8-1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="8-2" value="" size="1" maxlength="1" name="field8-2">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="9-1" value="0" pattren= ".{1,}" size="1" maxlength="1" name="field9-1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="9-2" value="" size="1" maxlength="1"name="field9-2">
                    </div>
                </td>
                

                <td class="first">
                    <div>
                        <input type="text" id="10-1"  value="0" pattren= ".{1,}" size="1" maxlength="1"name="field10-1">
                    </div>
                </td>
                <td class="second-notend">
                    <div>
                        <input type="text" id="10-2" value="" size="1" maxlength="1"name="field10-2">
                    </div>
                </td>
                <td class="third-end">
                    <div >
                        <input type="text" id="10-3" value=""  size="1" maxlength="1"name="field10-3">
                    </div>
                </td>

                <td rowspan="2" class="game-result">
                    <div >
                        <input type="text" id="result" value="0" size="10" maxlength="3" name="field_result">
                    </div>
                </td>
            </tr>

            <tr>
            <td colspan="21"><button>Insert</button></td>
            </tr>
        </tbody></table>


</div></div></form>