<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\WordAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $words = Word::with('wordAnswers')->where('user_id', $userId)->get();
            $keywords = request()->input('search');
            if (!empty($keywords)) {
                $words = Word::where('japanese_word', 'like', '%' . $keywords . '%')->orWhere('english_word', 'like', '%' . $keywords . '%')->get();
            }
            return view('word.index', compact('words', 'keywords'));
        } else {
            return redirect()->route('login')->with('danger', 'ログインしてください');
        }
    }

    public function create()
    {
        return view('word.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'japanese_word' => 'required',
            'english_word' => 'required',
        ];

        $this->validate($request, $rules);

        $userId = Auth::id();
        $word = new Word();
        $word->user_id = $userId;
        $word->japanese_word = $request->japanese_word;
        $word->english_word = $request->english_word;
        $word->save();

        return redirect()->route('word.index')->with('success', '登録しました');
    }

    public function edit($id)
    {
        $word = Word::find($id);
        if (Auth::id() !== $word->user_id) {
            return redirect()->route('word.index')->with('danger', '不正なアクセスです');
        }
        return view('word.edit', ['word' => $word]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'japanese_word' => 'required',
            'english_word' => 'required',
        ];

        $this->validate($request, $rules);

        $word = Word::find($id);
        if (Auth::id() !== $word->user_id) {
            return redirect()->route('word.index')->with('danger', '不正なアクセスです');
        }
        $word->japanese_word = $request->japanese_word;
        $word->english_word = $request->english_word;
        $word->save();

        return redirect()->route('word.index')->with('success', '単語を更新しました');
    }

    public function destroy($id)
    {
        $word = Word::find($id);
        if (Auth::id() !== $word->user_id) {
            return redirect()->route('word.index')->with('danger', '不正なアクセスです');
        }
        $word->delete();

        return redirect()->route('word.index')->with('success', '単語を削除しました');
    }

    public function quiz()
    {
        $words = Word::where('user_id', auth()->user()->id)
                ->inRandomOrder()
                ->limit(1)
                ->pluck('japanese_word');

        return view('word.quiz', compact('words'));
    }

    public function check(Request $request)
    {
    
        $japaneseWord = $request->input('japanese_word');
        $answer = $request->input('answer');

        // 正解判定のロジック
        $word = Word::where('japanese_word', $japaneseWord)
                ->where('user_id', auth()->user()->id)
                ->first();

        if (!$word) {
        abort(403); // ユーザーが所有していない単語へのアクセスは拒否する
        }

        $correctAnswer = $word->english_word;
        $isCorrect = $correctAnswer === $answer;

        // UserAnswerテーブルに回答を保存
        $wordAnswer = new WordAnswer;
        $wordAnswer->user_id = auth()->user()->id;
        $wordAnswer->word_id = $word->id;
        $wordAnswer->answer = $answer;
        $wordAnswer->is_correct = $isCorrect;
        $wordAnswer->save();

        return view('word.check', compact('isCorrect', 'japaneseWord', 'answer', 'correctAnswer'));
    }
}
