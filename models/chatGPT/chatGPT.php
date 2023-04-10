<?php

class ChatGPT
{
    private $model = "text-davinci-002";
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = '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';
    }

    public function ask($prompt, $maxTokens = 1024, $temperature = 0.5)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/engines/".$this->model."/jobs");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $data = array(
          "prompt" => $prompt,
          "max_tokens" => $maxTokens,
          "temperature" => $temperature,
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "Authorization: Bearer ".$this->apiKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        $result = json_decode($result, true);

        return $result["choices"][0]["text"];
    }
}