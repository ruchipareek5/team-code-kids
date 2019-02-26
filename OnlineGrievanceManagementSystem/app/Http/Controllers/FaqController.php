<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{

    /**
     *
     * This method gets the total number of institutes affiliated by AICTE
     * @return $numberOfInstitutesAffiliated
     *
     */
    public function getNumberOfInstitutesAffiliated()
    {
        $totalInstitutesAffiliated = DB::select("SELECT COUNT(*) as institutesAffiliated FROM grievancesystem.table_college");
        $numberOfInstitutesAffiliated = $totalInstitutesAffiliated[0]->institutesAffiliated;
        return $numberOfInstitutesAffiliated;
    }



    /**
     * This method gets the total number of grievances reported
     * @return $totalGrievancesReported
     */
    public function getNumberOfGrievanceReported()
    {
        $reportedGrievances = DB::select("SELECT count(*) as reportedGrievance FROM grievancesystem.table_grievance");
        $totalGrievancesReported = $reportedGrievances[0]->reportedGrievance;
        return $totalGrievancesReported;
    }


    /**
     *This method gets the total number of addressed grievances
     * @return $totalAddressedGrievances
     */
    public function getNumberOfAddressedGrievance()
    {
        $addressedGrievances = DB::select("SELECT count(*) as addressedGrievances FROM grievancesystem.table_grievance where table_grievance.status = 'addressed'");
        $totalAddressedGrievances = $addressedGrievances[0]->addressedGrievances;
        return $totalAddressedGrievances;
    }

    //

    /**
     *This method gets the total number of delayed grievances
     * @return $totalDelayedGrievance
     */
    public function getNumberOfDelayedGrievance()
    {
        $delayedGrievances = DB::select("SELECT COUNT(*) as delayedGrievance FROM grievancesystem.table_grievance where table_grievance.status = 'delayed'");
        $totalDelayedGrievances = $delayedGrievances[0]->delayedGrievance;
        return $totalDelayedGrievances;
    }

    /**
     * This method gets the total number of re-opened grievances
     * @return $totalReOpenedGrievance
     */
    public function getNumberOfReOpenedGrievance()
    {
        $reOpenedGrievance = DB::select("SELECT COUNT(*) as reOpenGrievance FROM grievancesystem.table_grievance where table_grievance.status = 'reopened'");
        $totalReOpenedGrievance = $reOpenedGrievance[0]->reOpenGrievance;
        return $totalReOpenedGrievance;
    }


    /**
     * This method returns total number of in action grievances
     * @return total number of in action grievance
     */
    public function getNumberOfInActionGrievance()
    {
        $inActionGrievance = DB::select("SELECT COUNT(*) as inActionGrievance FROM grievancesystem.table_grievance where table_grievance.status = 'inaction'");
        $totalInActionGrievance = $inActionGrievance[0]->inActionGrievance;
        return $totalInActionGrievance;
    }
}
