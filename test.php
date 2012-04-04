<table class="internal" width="100%" border="1">
    <tr>
        <th width="2%">Step No.</th><th>Activity</th><th>Timescale</th><th>Owner</th><th>Action</th>
    </tr>
    <tr>
    	<td align="center">1</td>
        <td align="center"><textarea style="width:200px" rows="3"></textarea></td>
        <td><select><option>10</option></select></td>
        <td><select style="width:150px"><option>Louis Coppola</option></select></td>
        <td><input type="button" value="remove" /></td>
    </tr>
   
</table>

  <?
					echo "test";
						if (empty($bcp_drservers->systemdetails)) {
							
							$step = $bcp_recover_row_id+1;
							println ('<tr class="bcp_recover_row" id="bcp_recover_row'.$bcp_recover_row_id.'">');
							println ('<td align="center" class="bcp_recover_step_no">'.$step.'</td>');
							//println ('<td><input type="hidden" name="bcp_id" class="bcp_id" id="bcp_id'.$bcp_recover_row_id.'" value="" /><input type="text" name="bcp_recover_activity_name" style="width:200px" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name" id="bcp_recover_activity_name'.$bcp_recover_row_id.'" /></td>');
							println ('<td><input type="hidden" name="bcp_id" class="bcp_id" id="bcp_id'.$bcp_recover_row_id.'" value="" /><textarea name="bcp_recover_activity_name" style="width:200px" rows="3" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name" id="bcp_recover_activity_name'.$bcp_recover_row_id.'" /></textarea></td>');
							println ('<td>');
							println ('<div style="width:100px;margin-left:5px; margin-top:5px;"><div style="width:55px; float:left;">Days:</div><div style="width:30px; float:left;">');
							println ('<select name="bcp_recover_days" class="bcp_recover_days" id="bcp_recover_days'.$bcp_recover_row_id.'" onchange="bcp_setUpdated();">'.$days0.'</select>');
							println ('</div></div>');
							println ('<div style="width:100px;margin-left:5px; margin-top:5px;"><div style="width:55px; float:left;">Hours:</div><div style="width:30px; float:left;">');
							println ('<select name="bcp_recover_hours" class="bcp_recover_hours" id="bcp_recover_hours'.$bcp_recover_row_id.'" onchange="bcp_setUpdated();">'.$hours0.'</select>');
							println ('</div></div>');
							println ('<div style="width:100px;margin-left:5px; margin-top:5px; margin-bottom:5px;"><div style="width:55px; float:left;">Minutes:</div><div style="width:30px; float:left;">');
							println ('<select name="bcp_recover_minutes" class="bcp_recover_minutes" id="bcp_recover_minutes'.$bcp_recover_row_id.'" onchange="bcp_setUpdated();" >'.$minutes0.'</select>');
							println ('</div></div>');
							println ('</td>');
							println ('<td >');
							if($option0) {
							println ('<select id="s'.$bcp_recover_row_id.'" multiple="multiple" class="bcp_recover_owner_name" name="bcp_recover_owner_name">'.$option0.'</select>');
							println ('<span id="returnS'.$bcp_recover_row_id.'"></span>');
							}
							println ('</td>');
							println ('<td>');
							println ('<input type="button" value="remove" disabled="disabled" />');
							println ('<input type="button" style="font-family: arial,verdana,arial;font-size: 18px;width:60px;" value="&#x25B2;" disabled="disabled" /><br />');
							println ('<input type="button" style="font-family: arial,verdana,arial;font-size: 18px; width:60px;" value="&#x25BC;" disabled="disabled" /><br />');
							println ('</td>');
							println ('</tr>');
							$bcp_recover_row_id++;
						}else {
							$sort = 0;
							$cnt = 0;
							foreach($bcp_drservers->systemdetails as $countno) {
								if($countno->system_id == $_GET['sysId']) {
									$cnt++;
								}
							}
							foreach($bcp_drservers->systemdetails as $systemDetail) {
								
								if($systemDetail->system_id == $_GET['sysId']) {
									
									$sort++;
									
									$strDisabledMoveUp	= ($sort==1)? "disabled='disabled'": "";
									$strDisabledMoveDown	= ($cnt == $sort)? "disabled='disabled'": "";
									if($systemDetail->sort_order == "") 
									{
										$systemDetail->sort_order = 0 ;
									}
									
									unset($selectedD);
									unset($selectedH);
									unset($selectedM);
									unset($selected0);
									unset($systemowner);
									unset($option);
									unset($days);
									unset($hours);
									unset($minutes);
								
									for($i=0; $i<=31; $i++) {
										$selectedD = ($i==$systemDetail->days)?'selected="selected"':'';
										$days .='<option value="'.$i.'" '.$selectedD.'>'.$i.'</option>';
									}
									for($j=0; $j<=24; $j++) {
										$selectedH = ($j==$systemDetail->hours)?'selected="selected"':'';
										$hours .='<option value="'.$j.'" '.$selectedH.'>'.$j.'</option>';
									}
									for($k=0; $k<=60; $k++) {
										$selectedM = ($k==$systemDetail->minutes)?'selected="selected"':'';
										$minutes .='<option value="'.$k.'" '.$selectedM.'>'.$k.'</option>';
									}
									
									$systemOwner = explode(",",$systemDetail->owner);
									
									foreach ($bcp_team->teamInfos as $id => $teamInfo){
										$bcp_team->getTeamMembersByTeamId($id);
										$tmMembers = $bcp_team->tmMems;
										if (isset($tmMembers['Leader'])) {
											$tmMember = $tmMembers['Leader'];
										} else {
											$tmMember = new bcp_team_member($bcp_db, array('unit_id' => $bcp_unit->id, 'team_id' => $id, 'role' => 'Leader'));
										}
										$tmMember->getDetails();
										
										if(($tmMember->section == 0 && $tmMember->flag == 1) || ($tmMember->section == 1)) {
											if(in_array($tmMember->name,$systemOwner)) {
												$selectedO = 'selected="selected"';
											}else {
												$selectedO = '';
											}
											$option .='<option value="'.$tmMember->name.'" '.$selectedO.'>'.$tmMember->name.'</option>';
										}
										
										if (isset($tmMembers['Alternate'])) {
											$tmMember = $tmMembers['Alternate'];

										} else {
											$tmMember = new bcp_team_member($bcp_db, array('unit_id' => $bcp_unit->id, 'team_id' => $id, 'role' => 'Alternate'));
										}
										$tmMember->getDetails();
										
										if(($tmMember->section == 0 && $tmMember->flag == 1) || ($tmMember->section == 1)) {
											if(in_array($tmMember->name,$systemOwner)) {
												$selectedO = 'selected="selected"';
											}else {
												$selectedO = '';
											}
											$option .='<option value="'.$tmMember->name.'" '.$selectedO.'>'.$tmMember->name.'</option>';
										}
										
										foreach ($tmMembers as $key => $tmMember) {
														
											if (!(($key == 'Leader') || ($key == 'Alternate') || ($key == 'Committee Chair') || ($key == 'Executive Sponsor') || ($key == 'Technology Lead'))) {
												$tmMember->getDetails();
												if(($tmMember->section == 0 && $tmMember->flag == 1) || ($tmMember->section == 1)) {
													if(in_array($tmMember->name,$systemOwner)) {
														$selectedO = 'selected="selected"';
													}else {
														$selectedO = '';
													}
													$option .='<option value="'.$tmMember->name.'" '.$selectedO.'>'.$tmMember->name.'</option>';
												}
											}
										}
										unset($selected0);
									}
	
									$step = $bcp_recover_row_id+1;
									println ('<tr class="bcp_recover_row" id="bcp_recover_row'.$bcp_recover_row_id.'">');
									println ('<td align="center" class="bcp_recover_step_no">'.$step.'</td>');
									//println ('<td><input type="hidden" name="bcp_id" class="bcp_id" id="bcp_id'.$bcp_recover_row_id.'" value="'.$systemDetail->id.'" /><input type="text" name="bcp_recover_activity_name" style="width:200px" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name" id="bcp_recover_activity_name'.$bcp_recover_row_id.'" value="'.$systemDetail->activity.'" /></td>');
									println ('<td><input type="hidden" name="bcp_id" class="bcp_id" id="bcp_id'.$bcp_recover_row_id.'" value="'.$systemDetail->id.'" /><textarea name="bcp_recover_activity_name" rows="3" style="width:200px" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name" id="bcp_recover_activity_name'.$bcp_recover_row_id.'">'.$systemDetail->activity.'</textarea></td>');
									println ('<td>');
									println ('<div style="width:100px;margin-left:5px; margin-top:5px;"><div style="width:55px; float:left;">Days:</div><div style="width:30px; float:left;">');
									println ('<select name="bcp_recover_days" class="bcp_recover_days" id="bcp_recover_days'.$bcp_recover_row_id.'" onchange="changetime();bcp_setUpdated();">'.$days.'</select>');
									println ('</div></div>');
									println ('<div style="width:100px;margin-left:5px; margin-top:5px;"><div style="width:55px; float:left;">Hours:</div><div style="width:30px; float:left;">');
									println ('<select name="bcp_recover_hours" class="bcp_recover_hours" id="bcp_recover_hours'.$bcp_recover_row_id.'" onchange="changetime();bcp_setUpdated();">'.$hours.'</select>');
									println ('</div></div>');
									println ('<div style="width:100px;margin-left:5px; margin-top:5px; margin-bottom:5px;"><div style="width:55px; float:left;">Minutes:</div><div style="width:30px; float:left;">');
									println ('<select name="bcp_recover_minutes" class="bcp_recover_minutes" id="bcp_recover_minutes'.$bcp_recover_row_id.'" onchange="changetime();bcp_setUpdated();" >'.$minutes.'</select>');
									println ('</div></div>');
									println ('</td>');
									println ('<td>');
									if($option) {
									println ('<select id="s'.$bcp_recover_row_id.'" multiple="multiple" class="bcp_recover_owner_name" name="bcp_recover_owner_name">'.$option.'</select>');
									println ('<span id="returnS'.$bcp_recover_row_id.'"></span>');
									}
									println ('</td>');
									
									println ('<td>');
									println ('<input type="button" value="remove" onclick="bcp_deleteStep('.$systemDetail->id.');" />');
									println ('<input type="button" style="font-size: 14px;width:60px;" value="&#x25B2;" '.$strDisabledMoveUp.' onclick="bcp_MoveUP_Step ( '.$systemDetail->id.','.$systemDetail->sort_order.','.$systemDetail->system_id.','.$sort.');" /><br />');
								println ('<input type="button" style="font-size: 14px; width:60px;" value="&#x25BC;" '.$strDisabledMoveDown.' onclick="bcp_MoveDOWN_Step( '.$systemDetail->id.','.$systemDetail->sort_order.','.$systemDetail->system_id.','.$sort.');" /><br />');
									println ('</td>');
									println ('</tr>');
									$bcp_recover_row_id++;
									
								}
							}
						}
						
					?>