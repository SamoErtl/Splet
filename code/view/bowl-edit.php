<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= CSS_URL . "style.css" ?>">
<meta charset="UTF-8" />
<title>Edit game</title>

<h1>Edit game</h1>

<?php include("view/menu-links.php"); ?>

<?php       list($field1_1,$field1_2 ,$field2_1 ,$field2_2 ,
            $field3_1 ,$field3_2 ,$field4_1 ,$field4_2 ,$field5_1, $field5_2 ,
            $field6_1,$field6_2,$field7_1,$field7_2,$field8_1,$field8_2,
            $field9_1,$field9_2,$field10_1,$field10_2,$field10_3,
            $field_result) = explode(",", $game["game_score"]); 
        ?>     
<form action="<?= BASE_URL . "bowl/edit" ?>" method="post">
	<input type="hidden" name="ID_game" value="<?= $game["ID_game"] ?>" />


<div id="test"></div>

<table id="bowling-table">
<tbody>
    <tr>
         
    </tr>

                <tr id="pointsField">
                <td colspan="2" style="" class="first"><?= $game["username"] ?></td>
                
                <td colspan="2"  class="first"><?= $game["game_date"] ?></td>
                <td class="first">
                    <div>
                        <input type="text" name="field1-1"  id="1-1" size="1" maxlength="1" value=<?= $field1_1 ?> >
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  name="field1-2"  id="1-2" size="1" maxlength="1" value=<?= $field1_2 ?>>
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field2-1"  id="2-1" size="1" maxlength="1" value="<?= $field2_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"name="field2-2"  id="2-2" size="1" maxlength="1" value="<?= $field2_2 ?>">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  name="field3-1"  id="3-1" size="1" maxlength="1" value="<?= $field3_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text" name="field3-2"  id="3-2"  size="1" maxlength="1" value="<?= $field3_2 ?>">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field4-1"   id="4-1"  size="1" maxlength="1" value="<?= $field4_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                    <input type="text" name="field4-2"   id="4-2"  size="1" maxlength="1" value="<?= $field4_2 ?>">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="5-1" name="field5-1"  size="1" maxlength="1" value="<?= $field5_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text" id="5-2"  name="field5-2" size="1" maxlength="1" value="<?= $field5_2 ?>">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text" name="field6-1" id="6-1"  size="1" maxlength="1" value="<?= $field6_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="6-2"name="field6-2"   size="1" maxlength="1" value="<?= $field6_2 ?>">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="7-1" name="field7-1" size="1" maxlength="1" value="<?= $field7_1 ?>">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="7-2" value="<?= $field7_2 ?>" size="1"name="field7-2" maxlength="1">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="8-1" value="<?= $field8_1 ?>" size="1"name="field8-1" maxlength="1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="8-2" value="<?= $field8_2 ?>" size="1" maxlength="1" name="field8-2">
                    </div>
                </td>

                <td class="first">
                    <div>
                        <input type="text"  id="9-1" value="<?= $field9_1 ?>" size="1" maxlength="1" name="field9-1">
                    </div>
                </td>
                <td class="second">
                    <div>
                        <input type="text"  id="9-2" value="<?= $field9_2 ?>" size="1" maxlength="1"name="field9-2">
                    </div>
                </td>
                

                <td class="first">
                    <div>
                        <input type="text" id="10-1"  value="<?= $field10_1 ?>"size="1" maxlength="1"name="field10-1">
                    </div>
                </td>
                <td class="second-notend">
                    <div>
                        <input type="text" id="10-2" value="<?= $field10_2 ?>" size="1" maxlength="1"name="field10-2">
                    </div>
                </td>
                <td class="third-end">
                    <div >
                        <input type="text" id="10-3" value="<?= $field10_3 ?>" size="1" maxlength="1"name="field10-3">
                    </div>
                </td>

                <td class="game-result">
                    <div >
                        <input type="text" id="result" value="<?= $field_result?>" size="10" maxlength="3" name="field_result">
                    </div>
                </td>
                <td class="first">
                <button >Save</button>
                </td>
            </tr>
            <tr> 
                <td colspan="5">
                       <p>
                        <label>Date: <input type="date" name="game_date" value="<?= $game["game_date"] ?>" required />
                        <span class="important"><?= $errors["game_date"] ?></span></label>
        <label>Public: <input type="checkbox" name="public_box" <?php echo ($game['public_box']=="on" ? 'checked' : '');?>> </label>
        </p>
                </td></form>
                <td colspan="5">
                    <form action="<?= BASE_URL . "bowl/delete" ?>" method="post">
                    <input type="hidden" name="ID_game" value="<?= $game["ID_game"] ?>"  />
                    <label>Delete? <input type="checkbox" name="delete_confirmation" title="Are you sure you want to delete this entry?" required /></label>
                    <button class="important">Delete record</button>
                    </form>
                </td>
            </tr>

</div></div>


</tbody></table>