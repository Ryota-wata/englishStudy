<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use App\Models\SentenceAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentenceController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $sentences = Sentence::with('SentenceAnswers')->where('user_id', $userId)->get();
            $keywords = request()->input('search');
            if (!empty($keywords)) {
                $sentences = Sentence::where('japanese_sentence', 'like', '%' . $keywords . '%')->orWhere('english_sentence', 'like', '%' . $keywords . '%')->get();
            }
            return view('sentence.index', compact('sentences', 'keywords'));
        } else {
            return redirect()->route('login')->with('danger', 'ログインしてください');
        }
    }

    public function create()
    {
        return view('sentence.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'japanese_sentence' => 'required',
            'english_sentence' => 'required',
        ];

        $this->validate($request, $rules);

        $userId = Auth::id();
        $sentence = new sentence();
        $sentence->user_id = $userId;
        $sentence->japanese_sentence = $request->japanese_sentence;
        $sentence->english_sentence = $request->english_sentence;
        $sentence->save();

        return redirect()->route('sentence.index')->with('success', '登録しました');
    }

    public function edit($id)
    {
        $sentence = Sentence::find($id);
        if (Auth::id() !== $sentence->user_id) {
            return redirect()->route('sentence.index')->with('danger', '不正なアクセスです');
        }
        return view('sentence.edit', ['sentence' => $sentence]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'japanese_sentence' => 'required',
            'english_sentence' => 'required',
        ];

        $this->validate($request, $rules);

        $sentence = Sentence::find($id);
        if (Auth::id() !== $sentence->user_id) {
            return redirect()->route('sentence.index')->with('danger', '不正なアクセスです');
        }
        $sentence->japanese_sentence = $request->japanese_sentence;
        $sentence->english_sentence = $request->english_sentence;
        $sentence->save();

        return redirect()->route('sentence.index')->with('success', '単語を更新しました');
    }

    public function destroy($id)
    {
        $sentence = Sentence::find($id);
        if (Auth::id() !== $sentence->user_id) {
            return redirect()->route('sentence.index')->with('danger', '不正なアクセスです');
        }
        $sentence->delete();

        return redirect()->route('sentence.index')->with('success', '単語を削除しました');
    }

    public function quiz()
    {
        $sentences = Sentence::where('user_id', auth()->user()->id)
                ->inRandomOrder()
                ->limit(1)
                ->pluck('japanese_sentence');

        return view('sentence.quiz', compact('sentences'));
    }

    public function check(Request $request)
    {
    
        $japaneseSentence = $request->input('japanese_sentence');
        $answer = $request->input('answer');

        // 正解判定のロジック
        $sentence = Sentence::where('japanese_sentence', $japaneseSentence)
                ->where('user_id', auth()->user()->id)
                ->first();

        if (!$sentence) {
        abort(403); // ユーザーが所有していない単語へのアクセスは拒否する
        }

        $correctAnswer = $sentence->english_sentence;
        $isCorrect = $correctAnswer == $answer;

        // UserAnswerテーブルに回答を保存
        $SentenceAnswer = new SentenceAnswer;
        $SentenceAnswer->user_id = auth()->user()->id;
        $SentenceAnswer->sentence_id = $sentence->id;
        $SentenceAnswer->answer = $answer;
        $SentenceAnswer->is_correct = $isCorrect;
        $SentenceAnswer->save();

        return view('sentence.check', compact('isCorrect', 'japaneseSentence', 'answer', 'correctAnswer'));
    }
}
