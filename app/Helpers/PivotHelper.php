<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class PivotHelper
{
    /**
     * Safely get pivot data for a diagnosis-produk relation.
     * MongoDB's Jenssegers driver sometimes returns null pivot.
     */
    public static function getDiagnosisProdukPivot($diagnosisId, $produkId)
    {
        $record = DB::collection('diagnosis_produks')
            ->where('diagnosis_id', (string) $diagnosisId)
            ->where('produk_id', (string) $produkId)
            ->first();

        return [
            'qty' => $record['qty'] ?? 1,
            'is_selected' => $record['is_selected'] ?? false,
        ];
    }

    /**
     * Get qty from pivot or fallback to DB query.
     */
    public static function getQty($produk, $diagnosisId)
    {
        if ($produk->pivot && isset($produk->pivot->qty)) {
            return $produk->pivot->qty;
        }

        $pivot = self::getDiagnosisProdukPivot($diagnosisId, $produk->id);
        return $pivot['qty'];
    }

    /**
     * Get is_selected from pivot or fallback to DB query.
     */
    public static function getIsSelected($produk, $diagnosisId)
    {
        if ($produk->pivot && isset($produk->pivot->is_selected)) {
            return $produk->pivot->is_selected;
        }

        $pivot = self::getDiagnosisProdukPivot($diagnosisId, $produk->id);
        return $pivot['is_selected'];
    }
}
