import { useParams } from 'react-router-dom';
import f from '../../Utils';
import { useEffect, useState } from 'react';
import type { fresp } from '../../Types';
import QARow from '../../components/QARow/QARow'

export type QAPair = {
    question: string,
    answer: string,
    asker: string
}
export function Subject() {
    const { id } = useParams()
    const [pairs, setPairs] = useState<QAPair[]>([]);
    useEffect(() => {
        f("subjectpairs", { "id": id }, () => { }, (resp: fresp) => {
            setPairs(resp.data);
        })
    }, [])
    return (
        <>
            <a href="/">Back to Home</a>
            <h1>Questions && Answers</h1>
            <div>
                {pairs.map((p, k) => <QARow question={p.question} answer={p.answer} asker={p.asker} key={k}></QARow>)}
            </div>
        </>)
}