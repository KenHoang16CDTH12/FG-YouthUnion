<?php 
namespace App\Repositories;
use App\LCDoan;
use Illuminate\Http\Request;
use App\Http\Resources\LCDoanResource;
use App\Http\Requests\StoreLCDoanRequest;
use App\Http\Requests\UpdateLCDoanRequest;

/**
 * 
 */
class LCDoanRepository
{
	/**
     * Get all of the users for a given user.
     *
     * @return Collection
     */
	public function collectionLCDoan()
	{
		return LCDoanResource::collection(LCDoan::paginate(25));
	}

	public function storeLCDoan(StoreLCDoanRequest $request)
	{
		return new LCDoanResource(LCDoan::create($request->all()));
	}

	public function updateLCDoan(UpdateLCDoanRequest $request, LCDoan $lcdoan)
    {
        $lcdoan->update($request->all());

        return new LCDoanResource($lcdoan);
    }

<<<<<<< HEAD
    public function deleteLCDoan($lcdoan)
=======
    public function deleteLCDoan(LCDoan $lcdoan) 
>>>>>>> 91fc537e5bb98ec9ade47023d74a345adcc9afb9
    {
      $lcdoan->delete();

      return response()->json(null, 204);
    }
}

?>