<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storep_updateRequest;
use App\Models\PUpdate;
use App\Http\Requests\StorePUpdateRequest;
use App\Http\Requests\Updatep_updateRequest;
use App\Http\Requests\UpdatePupdateMaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PUpdateController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePupdateMaintenanceRequest  $request
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePupdateMaintenanceRequest $request, $Maintenance, $PUpdate)
    {
        $input = $request->validated();
        $pupdate = PUpdate::find($PUpdate);

        $pupdate->id_user = Auth::user()->id;
        $pupdate->id_status = $input['id_status'];
        $pupdate->deskripsi = $input['deskripsi_update'];
        if (!is_null($input['image'])) {
            $imagepath = Storage::put('public/images/Maintenance', $request->file('image'));
            $pupdate->image = $imagepath;
        }
        if ($pupdate->update()) {
            return response()->json(['status' => 'Data Update Maintenance Berhasil Diperbarui !'], 201);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PUpdate  $PUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(PUpdate $PUpdate)
    {
        //
    }
}
