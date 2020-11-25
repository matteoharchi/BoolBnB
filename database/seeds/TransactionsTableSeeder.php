<?php

use App\House;
use App\Service;
use App\Sponsor;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Conteggio case e sponsor
        $housesCount = count(House::all()->toArray());
        $sponsorsCount = count(Sponsor::all()->toArray());

        for ($i = 0; $i < 5; $i++) {

            $newTransaction = new Transaction;
            $newTransaction->house_id = rand(1, $housesCount);
            $newTransaction->sponsor_id = rand(1, $sponsorsCount);

            //Cerco id sponsor e gli assegno la sua durata
            $sponsor = Sponsor::find($newTransaction->sponsor_id);
            $sponsorDuration = $sponsor->duration;

            //Carbon per datetime attuale e per la data di scadenza dello sponsor
            $now = Carbon::now();
            $end_date = Carbon::parse(Transaction::where('house_id', $newTransaction->house_id)->pluck('end_date')->sortDesc()->first());

            // if assegna alla data di partenza dello sponsor la fine dell'abbonamento precedente, altrimenti usa now
            if ($end_date->greaterThan($now)) {
                $newTransaction->start_date = $end_date;
            } else {
                $newTransaction->start_date = $now;
            };

            //Aggiunta ore della durata dello sponsor alla data di scadenza
            $newTransaction->end_date = Carbon::parse($newTransaction->start_date)->addHours($sponsorDuration);

            $newTransaction->save();

        }
    }
}
