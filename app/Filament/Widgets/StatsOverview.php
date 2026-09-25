<?php

namespace App\Filament\Widgets;

use App\Models\Reservation;
use App\Models\TableReservation;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $monthlyRevenue = Reservation::where('status', 'confirmed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_amount');

        $todayTableReservations = TableReservation::whereDate('reservation_date', Carbon::today())
            ->sum('guests');

        $totalRooms = Room::where('is_active', true)->count();
        $occupiedRooms = Reservation::where('status', 'confirmed')
            ->whereDate('check_in', '<=', Carbon::today())
            ->whereDate('check_out', '>', Carbon::today())
            ->count();

        $occupancyRate = $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0;

        return [
            Stat::make('Chiffre d\'affaires (Mois)', number_format($monthlyRevenue, 0, ',', ' ') . ' FCFA')
                ->description('Revenus des réservations confirmées')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
                
            Stat::make('Taux d\'occupation', $occupancyRate . '%')
                ->description($occupiedRooms . ' chambres occupées sur ' . $totalRooms)
                ->descriptionIcon('heroicon-m-home-modern')
                ->color($occupancyRate > 80 ? 'success' : 'warning'),
                
            Stat::make('Couverts Restaurant (Aujourd\'hui)', $todayTableReservations)
                ->description('Personnes attendues au Maquis de Luxe aujourd\'hui')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('info'),
        ];
    }
}
