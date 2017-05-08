<?php
namespace MbCreditoCBO\Helpers;

class MimeTypeHelper
{
    /**
     * @var array de mime types
     *
     * Lista de mime types suportados pelo sistema
     */
    private $mimeTypes = [
        'application/pdf',
        'image/jpeg',
        'image/png'
    ];

    /**
     * @param string $path
     * @return mixed
     */
    public function getMimeType(string $path)
    {
        # Recuperando o mime tipe da imagem
        $mimeType = mime_content_type($path);

        # Retorna o mime solicitado
        return $this->mimeTypes[
            array_search($mimeType, $this->mimeTypes)
        ];
    }

    /**
     * @param string $path
     * @param string $nomeArquivo
     * @return string
     */
    public function getNewNameWithExtension(string $path, string $nomeArquivo)
    {
        # Recuperando as partes do arquivo
        $pathParts = pathinfo($path);

        # Retorno do nome com estensão
        return "{$nomeArquivo}.{$pathParts['extension']}";
    }
}