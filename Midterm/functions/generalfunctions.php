<?php
function isDate($date)
	{
		try
		{
			$d = new DateTime($date);
			return true;
		}
		catch (Exception $e)
		{
			return false;
		}
    }