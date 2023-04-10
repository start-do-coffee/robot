<?php

class ChatGPT {
    private $openai_api_key;
    private $model_engine;

    public function __construct($engine = 'gpt-3.5-turbo') {
        $this->openai_api_key = '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';
        $this->model_engine = $engine;
    }

    public function ask($prompt, $temperature = 0.7, $max_tokens = 60) {
        $data = array(
            'model' => $this->model_engine,
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $max_tokens,
        );
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->openai_api_key,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/engines/' . $this->model_engine . '/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $response_array = json_decode($response, true);
        $answer = $response_array['choices'][0]['text'];
        return $answer;
    }
}
