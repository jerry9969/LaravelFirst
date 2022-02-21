<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetldRequest;
use App\Http\Requests\UpdatetldRequest;
use App\Repositories\tldRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TldController extends AppBaseController
{
    /** @var tldRepository $tldRepository*/
    private $tldRepository;

    public function __construct(tldRepository $tldRepo)
    {
        $this->tldRepository = $tldRepo;
    }

    /**
     * Display a listing of the tld.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tlds = $this->tldRepository->all();

        return view('tlds.index')
            ->with('tlds', $tlds);
    }

    /**
     * Show the form for creating a new tld.
     *
     * @return Response
     */
    public function create()
    {
        return view('tlds.create');
    }

    /**
     * Store a newly created tld in storage.
     *
     * @param CreatetldRequest $request
     *
     * @return Response
     */
    public function store(CreatetldRequest $request)
    {
        $input = $request->all();

        $tld = $this->tldRepository->create($input);

        Flash::success('Tld saved successfully.');

        return redirect(route('tlds.index'));
    }

    /**
     * Display the specified tld.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tld = $this->tldRepository->find($id);

        if (empty($tld)) {
            Flash::error('Tld not found');

            return redirect(route('tlds.index'));
        }

        return view('tlds.show')->with('tld', $tld);
    }

    /**
     * Show the form for editing the specified tld.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tld = $this->tldRepository->find($id);

        if (empty($tld)) {
            Flash::error('Tld not found');

            return redirect(route('tlds.index'));
        }

        return view('tlds.edit')->with('tld', $tld);
    }

    /**
     * Update the specified tld in storage.
     *
     * @param int $id
     * @param UpdatetldRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetldRequest $request)
    {
        $tld = $this->tldRepository->find($id);

        if (empty($tld)) {
            Flash::error('Tld not found');

            return redirect(route('tlds.index'));
        }

        $tld = $this->tldRepository->update($request->all(), $id);

        Flash::success('Tld updated successfully.');

        return redirect(route('tlds.index'));
    }

    /**
     * Remove the specified tld from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tld = $this->tldRepository->find($id);

        if (empty($tld)) {
            Flash::error('Tld not found');

            return redirect(route('tlds.index'));
        }

        $this->tldRepository->delete($id);

        Flash::success('Tld deleted successfully.');

        return redirect(route('tlds.index'));
    }
}
