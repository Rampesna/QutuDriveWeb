<?php

namespace App\Services\Eloquent;


use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IDocumentService;
use App\Models\Eloquent\Document;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class DocumentService implements IDocumentService
{

    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $documents = Document::orderBy('id', 'desc')->get();
        return new ServiceResponse(true, __('ServiceResponse/Eloquent/DocumentService.getAll.success'), 200, $documents);
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $document = Document::find($id);
        if ($document) {
            return new ServiceResponse(true, __('ServiceResponse/Eloquent/DocumentService.getById.exists'), 200, $document);
        }else{
            return new ServiceResponse(false, __('ServiceResponse/Eloquent/DocumentService.getById.notFound'), 404, null);
        }
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function delete(int $id): ServiceResponse
    {
        $document = Document::find($id);
        if ($document) {
            $file = public_path('/documents/' . str_replace('public/documents/', '', $document->path));
            if (FacadesFile::exists(str_replace('public/documents/', 'documents/', $document->path))) {
                FacadesFile::delete(str_replace('public/documents/', 'documents/', $document->path));
            }
            $document->delete();
           // Log::channel('activity')->info('Document deleted', ['id' => auth()->user()->ID,'user' => auth()->user()->KULLANICIADI,'data' => $document]);
            return new ServiceResponse(true, __('ServiceResponse/Eloquent/DocumentService.delete.success'), 200, null);
        }else{
            return new ServiceResponse(false, __('ServiceResponse/Eloquent/DocumentService.delete.notFound'), 404, null);
        }
    }

    /**
     * @param string $name
     * @param string $path
     * @return ServiceResponse
     */
    public function create(string $name, $file): ServiceResponse
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/documents', $fileName);
        $document = new Document();
        $document->name = $name;
        $document->path ='storage/documents/' . $fileName;
        $document->save();
        return new ServiceResponse(true, __('ServiceResponse/Eloquent/DocumentService.create.success'), 200, $document);
    }

    /**
     * @param int $id
     * @param string $name
     * @param $file
     * @return ServiceResponse
     */
    public function update(int $id, string $name, $file = null): ServiceResponse
    {

        $document = Document::find($id);
        if ($document) {
            if ($file) {
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/documents', $fileName);
                $document->path = 'storage/documents/' . $fileName;
            }
            $document->name = $name;
            $document->save();
            return new ServiceResponse(true, __('ServiceResponse/Eloquent/DocumentService.update.success'), 200, $document);
        }else{
            return new ServiceResponse(false, __('ServiceResponse/Eloquent/DocumentService.update.notFound'), 404, null);
        }
    }
}
