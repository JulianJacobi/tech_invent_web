<link href="plugins/events/css/calendar_year.css" rel="stylesheet" type="text/css">
<div class="templates_container events_calendar_year">
	<p class="templates_headline events_calendar_year_headline"><?php print($strings['events']['calendar_year_headline']." (".date(Y, time()).")"); ?></p>
	<table class="events_calendar_year_yeartable">
		<?php
		$year = date(Y, time());
		for($month = 1; $month <= 12; $month++) {
			if ($month == 1 || $month == 5 || $month == 9) {
				print("<tr><td>");
			} elseif ($month == 2 || $month == 3 || $month == 4 || $month == 6 || $month == 7 || $month == 8 || $month == 10 || $month == 11 || $month == 12) {
				print("</td><td>");
			}
			//monate
			print('<table class="events_calendar_year_monthtable">');
			?>
			<tr><td colspan="7">
				<p class="events_calendar_year_monthname"><?php print($strings['events']['calender_year_month_'.$month]) ?></p>
			</td></tr>
			<tr>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_monday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_tuesday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_wednesday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_thursday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_friday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_saturday']) ?></p>
				</td>
				<td>
					<p class="events_calendar_year_monthtable_head"><?php print($strings['events']['calender_year_sunday']) ?></p>
				</td>
			</tr>
			<?php
			$zeit = strtotime($year."-".$month."-1");
			$monthstart = date(N, $zeit);
			$daysofmonth = date(t, $zeit);
			$zeit_before = strtotime($year."-".($month-1)."-1");
			$daysofmonthbefore = date(t, $zeit_before);
			for ($i = 1; $i <= 6; $i++) {
				for ($weekday = 1; $weekday <= 7; $weekday++) {
					if ($weekday == 1) {
						print("<tr><td>");
					} else {
						print("</td><td>");
					}
					//Tageszahl
					$monthday = ($weekday + (($i-1) * 7))+1-$monthstart;
					if ($monthday <= 0) {
						//vorheriger Monat
						echo($monthday + $daysofmonthbefore);
					} elseif ($monthday <= $daysofmonth) {
						//Aktueller Monat
						echo($monthday);
					} else {
						//Nächster Monat
						echo($monthday - $daysofmonth);
					}
					if ($weekday == 7) {
						print("</td></tr>");
					}
				}
			}
			print('</table>');
			
			if ($month == 4 || $month == 8 || $month == 12) {
				print("</td></tr>");
			}
		}
		?>
	</table>
</div>