<div class="bcp center">
<form id="bcp_system_detail" method="post" action="">
<table class="layout" cellpadding="5">
    <tr>
      <td>
            <table class = "instruction">
            	<tr><td class="headerplanname"><h3><span id="bcp_planname_span"></span></h3></td></tr>
            	<tr>
                  <td align="center">
                     <input type="hidden" id="bcp_action" name="bcp_action" value="action" />
                    <input type="button" id="bcp_submit" value="action" onClick="bcp_submitAdditionalInfo();" />
                     <input type="button" value="back"  onclick="bcp_serverList();" />
                    <input id="bcp_main_menu" type="button" value="main menu" onClick="bcp_mainMenu();" />

                  </td>
           		</tr>
            </table>
      </td>
    </tr>
    <tr><td>

	<table border="1" width="100%" id="table1" style="border-left:0px solid #000000; border-right:0px solid #000000; border-top:0px solid #000000; ; border-bottom-width:0px" bgcolor="#FFFFD9"><tr><td style="border:1px solid #000000; "><p align="center"><br><font color="#0079C1"><b><img src = "/images/bcp/goarrow.gif"> '.$name.' - Recovery Requirements & Timescales</b></font><br /></td></tr></table><br/><br />

</td></tr>
	
	</tr>

	<tr>
  		<td>
        	<div class="tabset_content" style="display:block">
                <table class = "instruction">
                        <tr><td class = "header"><b><font color="#FFFFFF">Instructions</font></b></td></tr>
                        <tr><td class = "body">
                        <br><p>Coming Soon...</p>
                         </td>
                        </tr>
                </table>
                <table class="internal" width="100%">
                	<tr>
                    	<th width="10%">Step No.</th><th width="48%">Activity</th><th width="12%">Timescale</th><th width="20%">Owner</th><th width="10%">Action</th>
                    </tr>
                   		<tr class="bcp_recover_row" id="bcp_recover_row'.$bcp_recover_row_id.'">
							<td align="center" class="bcp_recover_step_no">1</td>
							<td><input type="hidden" name="bcp_id" class="bcp_id" value="" /><input type="text" name="bcp_recover_activity_name" style="width:200px" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name"  /></td>
							<td><input type="hidden" name="bcp_id" class="bcp_id"  value="" /><textarea name="bcp_recover_activity_name" style="width:210px" rows="3" onkeyup="bcp_setUpdated();" class="bcp_recover_activity_name"  /></textarea></td>
							<td>
							<div style="width:90px;margin-top:5px;"><div style="width:50px; float:left;">Days:</div><div style="width:30px; float:left;">
							<select name="bcp_recover_days" class="bcp_recover_days" onchange="bcp_setUpdated();"><option>1</option></select>
							</div></div>
							<div style="width:90px;margin-top:5px;"><div style="width:50px; float:left;">Hours:</div><div style="width:30px; float:left;">
							<select name="bcp_recover_hours" class="bcp_recover_hours"  onchange="bcp_setUpdated();"><option>1</option></select>
							</div></div>
							<div style="width:90px;margin-top:5px; margin-bottom:5px;"><div style="width:50px; float:left;">Minutes:</div><div style="width:30px; float:left;">
							<select name="bcp_recover_minutes" class="bcp_recover_minutes"  onchange="bcp_setUpdated();" ><option>1</option></select>
							</div></div>
							</td>
							<td >
							<select multiple="multiple" class="bcp_recover_owner_name" name="bcp_recover_owner_name"><option>test</option></select>
							</td>
							<td>
							<input type="button" value="remove" disabled="disabled" />
							<input type="button" style="font-family: arial,verdana,arial;font-size: 18px;width:60px;" value="&#x25B2;" disabled="disabled" /><br />
							<input type="button" style="font-family: arial,verdana,arial;font-size: 18px; width:60px;" value="&#x25BC;" disabled="disabled" /><br />
							</td>
							</tr>
						
                    
                	<tr id="total" >
                    	<td colspan="5" align="center" style="padding:20px"><b>Total Time: </b><span id="totaltdval"></span></td>
                    </tr>
                    <tr>
                        <td colspan="5"><input type="button" value="Add Step" onClick="addstep();" /></td>
                    </tr>
                </table>
                <br>
             </div>
        </td>
    </tr>
     
    <tr>
        <td align="center">
        	<input type="hidden" id="bcp_systems" name="bcp_systems" value="" />
            <input type="hidden" id="status" name="status" value="0" />
      		<input type="hidden" id="bcp_action2" name="bcp_action2" value="action" />
            <input type="hidden" id="bcp_phase_id" name="bcp_system_id" value="" />
            <input type="hidden" id="bcp_remove_step_id" name="bcp_remove_step_id" value="" />
            <input type="hidden" id="bcp_step_id_sort_order" name="bcp_step_id_sort_order" value="" />
			<input type="hidden" id="bcp_step_id_temp_sort_order" name="bcp_step_id_temp_sort_order" value="" />
			<input type="button" id="bcp_submit2" value="action" onClick="bcp_submitAdditionalInfo();" />
             <input type="button" value="back"  onclick="bcp_serverList();" />
			<input id="bcp_main_menu" type="button" value="main menu" onClick="bcp_mainMenu();" />
        	
        </td>
    </tr>
</table>
</form>
</div>
