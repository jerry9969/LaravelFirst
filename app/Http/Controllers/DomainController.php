<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use App\Repositories\DomainRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Client;
use App\imports\DomainsImport;
use DomainsImport as GlobalDomainsImport;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\Validation\Validator;
use Laracasts\Flash\Flash as FlashFlash;
use Laravel\Ui\Presets\React;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class DomainController extends AppBaseController
{
    /** @var DomainRepository $domainRepository*/
    private $domainRepository;

    public function __construct(DomainRepository $domainRepo)
    {
        $this->domainRepository = $domainRepo;
    }

    /**
     * Display a listing of the Domain.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $domains = $this->domainRepository->all();
        //$clients=array('1'=>'abc');
        //print_r($clients['1']);
        //exit;
        return view('domains.index')
            ->with('domains', $domains);
    }
    /**
     * Show the form for creating a new Domain.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::pluck('name','id');
        // dd($clients);

        return view('domains.create',compact('clients'));
    }

    //show the import functionality to import excel file with details of clients and domains
    public function import(Request $request){
        return view('domains.import');
    }

    public function importExcel(Request $request){
        //dd($request->file('file'));
        //$validator = Validator()->make($request->file('file'), [
          //  'file' => 'required|mimes:xls,xlsx'
        //]);
        
        //if($validator->fails()){
            //dd('fails');
            //return redirect()->back()->with('error uploading...!');
        //}else{
            //dd('success');
            //return redirect()->back()->with('Success...!');
        //}
        Excel::import(new DomainsImport,$request->file('file'));
        Flash::success('Imported Successfully...!');
        return redirect(route('domains.importexcel'));
    }
    

    /**
     * Store a newly created Domain in storage.
     *
     * @param CreateDomainRequest $request
     *
     * @return Response
     */
    public function store(CreateDomainRequest $request)
    {
        $input = $request->all();

        $domain = $this->domainRepository->create($input);

        Flash::success('Domain saved successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Display the specified Domain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        return view('domains.show')->with('domain', $domain);
    }

    /**
     * Show the form for editing the specified Domain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        return view('domains.edit')->with('domain', $domain);
    }

    /**
     * Update the specified Domain in storage.
     *
     * @param int $id
     * @param UpdateDomainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDomainRequest $request)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $domain = $this->domainRepository->update($request->all(), $id);

        Flash::success('Domain updated successfully.');

        return redirect(route('domains.index'));
    }

    /**
     * Remove the specified Domain from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $domain = $this->domainRepository->find($id);

        if (empty($domain)) {
            Flash::error('Domain not found');

            return redirect(route('domains.index'));
        }

        $this->domainRepository->delete($id);

        Flash::success('Domain deleted successfully.');

        return redirect(route('domains.index'));
    }
}
